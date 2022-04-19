<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class FrontEndController extends Controller
{
    public function __construct()
    {
        set_time_limit(8000000);
    }

    public function create(Request $request, Customer $customer)
    {
        $method = $request->method();

        if ($request->isMethod('post')) {

            $input = $request->all();
            $validator = Validator::make($input, [
                'firstname' => 'required',
                'lastname' => 'required',
                'age' => 'required',
                'dob' => 'required',
                'email' => 'required',
            ]);
            if ($validator->fails()) {
                return $this->sendError('Validation Error.', $validator->errors());
            } else {

                $customer->first_name = $request->input('firstname');
                $customer->last_name = $request->input('lastname');
                $customer->email = $request->input('email');
                $customer->dob = $request->input('dob');
                $customer->age = $request->input('age');
                $customer->creation_date = Carbon::today()->toDateString();;

                if ($customer->save()) {
                    //$data['success'] = "Customer Registered Successpully";
                    $customerData = Customer::all();
                    return view('list')->with('customerData', $customerData);
                } else {
                    $data['error'] = "Something went wrong";
                    return view('register', $data);
                }
            }

        } else {
            return view('register');
        }

    }

    public function list(Request $request, Customer $customer)
    {

        if ($request->isMethod('post')) {

        } else {
            $customerData = Customer::all();
            return view('list')->with('customerData', $customerData);
        }

    }

    public function Showupdate($id)
    {
        $customerData = Customer::findOrFail($id);
        return view('update')->with('customerData', $customerData);
    }

    public function update(Request $request, $id){
        $input = $request->all();
        $validator = Validator::make($input, [
            'firstname' => 'required',
            'lastname' => 'required',
            'age' => 'required',
            'dob' => 'required',
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        } else {

            $customerData['first_name'] = $request->input('firstname');
            $customerData['last_name'] = $request->input('lastname');
            $customerData['email'] = $request->input('email');
            $customerData['dob'] = $request->input('dob');
            $customerData['age'] = $request->input('age');

            $customer = new Customer();
            if ($customer->where('id',$id)->update($customerData)) {
                //$data['success'] = "Customer Registered Successpully";
                $customerData = Customer::all();
                return view('list')->with('customerData', $customerData);
            } else {
                $data['error'] = "Something went wrong";
                return view('register', $data);
            }
        }
    }

    public function delete($id){

        $user=Customer::find($id);
        if($user->delete()){
            $customerData = Customer::all();
            return view('list')->with('customerData', $customerData);
        }
    }

}
