<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //GET SEARCH TERM FROM REQUEST
        $searchTerm = $request->input('q');

        // VALIDATE AND SET SORTING PARAMETERS
        $validSortColumns = ['id', 'product_name', 'price'];
        $sortBy = in_array($request->input('sort_by'), $validSortColumns, true) ? $request->input('sort_by') : 'id';
        $sortDirection = in_array($request->input('sort_direction'), ['asc', 'desc'], true) ? $request->input('sort_direction') : 'desc';

        // VALIDATE AND SET PAGINATION LIMIT
        $limit = $request->input('limit', 5);
        $limit = is_numeric($limit) && $limit > 0 && $limit <= 100 ? (int) $limit : 5;

        // INITIALIZE QUERY WITH USER SCOPE
        $query = Category::query()->where('user_id', Auth::id());

        // APPLY SEARCH FILTER IF SEARCH TERM EXISTS
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('slug', 'like', '%' . $searchTerm . '%');
            });
        }

        // APPLY SORTING
        $query->orderBy($sortBy, $sortDirection);

        // EXECUTE PAGINATED QUERY
        $categories = $query->paginate($limit);

        // PRESERVE ALL QUERY PARAMETERS IN PAGINATION LINKS
        $categories->appends([
            'q' => $searchTerm,
            'sort_by' => $sortBy,
            'sort_direction' => $sortDirection,
            'limit' => $limit,

        ]);

        // RETURN RESULTS AS JSON RESOURCE COLLECTION
        return CategoryResource::collection($categories)
            ->additional([
                'message' => 'Categories retrieved successfully',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = Category::create([...$request->validated(), 'user_id' => Auth::id()]);

        return response()->json([
            'message' => 'Category created successfully',
            'data'    => new CategoryResource($category),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
            'message' => 'Customer showed successfully',
            'data' => new CategoryResource($category),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->fill([...$request->validated()]);
        $category->save();

        return response()->json([
            'message' => 'Category updated successfully',
            'data'    => new CategoryResource($category->fresh()),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json(
            [
                'message' => 'Category deleted successfully',
            ],
            200
        );
    }
}
