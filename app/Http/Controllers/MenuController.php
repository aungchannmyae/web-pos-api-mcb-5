<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Http\Requests\StoreMenuRequest;
use App\Http\Requests\UpdateMenuRequest;
use App\Http\Resources\MenuResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // GET SEARCH TERM FROM REQUEST
        $searchTerm = $request->input('q');

        // VALIDATE AND SET SORTING PARAMETERS
        $validSortColumns = ['id', 'title', 'price'];
        $sortBy = in_array($request->input('sort_by'), $validSortColumns, true)
            ? $request->input('sort_by')
            : 'id';

        $sortDirection = in_array($request->input('sort_direction'), ['asc', 'desc'], true)
            ? $request->input('sort_direction')
            : 'desc';

        // VALIDATE AND SET PAGINATION LIMIT
        $limit = $request->input('limit', 5);
        $limit = is_numeric($limit) && $limit > 0 && $limit <= 100
            ? (int) $limit
            : 5;

        // INITIALIZE QUERY WITH USER SCOPE
        $query = Menu::query()->where('user_id', Auth::id());

        // APPLY SEARCH FILTER
        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'like', '%' . $searchTerm . '%')
                    ->orWhere('slug', 'like', '%' . $searchTerm . '%')
                    ->orWhere('price', 'like', '%' . $searchTerm . '%');
            });
        }

        // APPLY SORTING
        $query->orderBy($sortBy, $sortDirection);

        // EXECUTE PAGINATED QUERY
        $menus = $query->paginate($limit);

        // PRESERVE QUERY PARAMETERS
        $menus->appends([
            'q' => $searchTerm,
            'sort_by' => $sortBy,
            'sort_direction' => $sortDirection,
            'limit' => $limit,
        ]);

        // RETURN RESOURCE COLLECTION
        return MenuResource::collection($menus)
            ->additional([
                'message' => 'Menus retrieved successfully',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuRequest $request)
    {
        $menu = Menu::create([
            ...$request->validated(),
            'user_id' => Auth::id(),
        ]);

        return response()->json([
            'message' => 'Menu created successfully',
            'data'    => new MenuResource($menu),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        return response()->json([
            'message' => 'Menu showed successfully',
            'data'    => new MenuResource($menu),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, Menu $menu)
    {
        $menu->fill($request->validated());
        $menu->save();

        return response()->json([
            'message' => 'Menu updated successfully',
            'data'    => new MenuResource($menu->fresh()),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();

        return response()->json([
            'message' => 'Menu deleted successfully',
        ], 200);
    }
}
