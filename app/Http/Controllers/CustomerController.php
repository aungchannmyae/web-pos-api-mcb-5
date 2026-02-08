<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerResource;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // search params
        $query = $request->get('q');
        $gender = $request->get('gender');

        // sort params
        $validSortColumns = ['id', 'name', 'email', 'phone', 'address', 'gender', 'date_of_birth'];
        $sortBy = in_array($request->input('sort_by'), $validSortColumns, true) ? $request->input('sort_by') : 'id';
        $sortDirection = in_array($request->input('sort_direction'), ['asc', 'desc'], true) ? $request->input('sort_direction') : 'desc';


        $customers = Customer::query();

        // search query
        if ($query) {
            $customers->where(function ($q) use ($query) {
                $q->where('name', 'like', '%' . $query . '%')
                    ->orWhere('email', 'like', '%' . $query . '%')
                    ->orWhere('phone', 'like', '%' . $query . '%')
                    ->orWhere('address', 'like', '%' . $query . '%');
            });
        }

        // gender filter
        if ($gender) {
            $customers->where('gender', '=', $gender);
        }

        // order by
        $customers = $customers->orderBy($sortBy, $sortDirection)->paginate(10);

        return CustomerResource::collection($customers)
            ->additional([
                'message' => 'Customers retrieved successfully',
            ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {

        $customerData = [...$request->validated(), 'user_id' => auth()->user()->id];


        $customer = Customer::create($customerData);

        return response()->json(["message" => "customer created successfully", "data" =>  new CustomerResource($customer)]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'message' => 'Customer retrieved successfully',
            'data' => new CustomerResource($customer)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {

        $customer->update($request->validated());

        return response()->json([
            'message' => 'Customer updated successfully',
            'data' => new CustomerResource($customer)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'message' => 'Customer deleted successfully'
        ]);
    }
}
