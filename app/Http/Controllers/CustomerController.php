<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        $customer = Customer::all();
        return response()->json($data =[
           'status' => 'Success',
           'message' => 'List customer',
           'data' => $customer
        ]);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            $data = [
                'status' =>'errors',
                'message' =>'customer not exits'
            ];
        }else {
            $customer->delete();
            $data = [
              'status' => 'Success',
              'message' => 'Xoá Thành Công!',
              'data' => Customer::all()
            ];
        }
        return response()->json($data);
    }

    public function update($id)
    {
        $customer = Customer::find($id);
        if (!$customer) {
            $data = [
                'status' =>'errors',
                'message' =>'customer not exits'
            ];
        }else {
            $data = [
                'status' => 'success',
                'data' => $customer
            ];
        }
        return response()->json($data);
    }




    public function edit(UpdateCustomerRequest $request,$id)

    {
        try {
            $customer = Customer::find($id);
            $customer->name = $request->name;
            $customer->email = $request->email;
            $customer->phone = $request->phone;
            $customer->save();
        }catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'Không thể update customer'
            ];
            return response()->json($data);
        }
        $data = [
            'status' => 'success',
            'message' => 'Update Customer Thành Công!'
        ];

        return response()->json($data);
    }
}
