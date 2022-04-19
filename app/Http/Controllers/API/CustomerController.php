<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\Customer;
use Validator;
use App\Http\Resources\Customer as CustomerResource;

class CustomerController extends BaseController
{
    // Display
    public function index()
    {
        $customer = Customer::all();

        return $this->sendResponse(CustomerResource::collection($customer), 'Customer data retrieved successfully.');
    }

    // Create Customer
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'dob' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer = Customer::create($input);

        return $this->sendResponse(new CustomerResource($customer), 'Customer created successfully.');
    }

    // Filter Customer By ID
    public function show($id)
    {
        $customer = Customer::find($id);

        if (is_null($customer)) {
            return $this->sendError('Customer not found.');
        }

        return $this->sendResponse(new CustomerResource($customer), 'Customer data retrieved successfully.');
    }

    // Update Customer By ID
    public function update(Request $request, Customer $customer)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'first_name' => 'required',
            'last_name' => 'required',
            'age' => 'required',
            'dob' => 'required',
            'email' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $customer->first_name = $input['first_name'];
        $customer->last_name = $input['last_name'];
        $customer->email = $input['email'];
        $customer->age = $input['age'];
        $customer->dob = $input['dob'];

        $customer->save();

        return $this->sendResponse(new CustomerResource($customer), 'Customer Data updated successfully.');
    }

    // Delete Customer By ID
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return $this->sendResponse([], 'Customer deleted successfully.');
    }
}
