<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CustomerController extends Controller
{
    public function customerRead(){
        $customer = Customer::with('customerMemberships')->get();
        return view('admin.customerRead', compact('customer'));
    }

    public function customerInsert(){
        return view('admin.customerInsert');
    }

    public function customerUpdate(string $id){
        $customer = Customer::find($id);
        return view('admin.customerUpdate', compact('customer'));
    }

    public function handleCustomerInsert(Request $r) {
        $validated = Validator::make($r->all(), [
            'nama_customer' => 'required',
            'id_membership' => [
                'required',
                Rule::exists('memberships','id')
            ],
            'alamat_customer' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $customer = new Customer();
        $customer->nama_customer = $r->nama_customer;
        $customer->id_membership = $r->id_membership;
        $customer->alamat_customer = $r->alamat_customer;
        $customer->save();

        return redirect()->route('admin.customerRead');
    }

    public function handleCustomerDelete(string $id)
    {
        Customer::find($id)->delete();
        return redirect()->back();
    }

    public function handleCustomerUpdate(Request $r, string $id) {
        $validated = Validator::make($r->all(), [
            'nama_customer' => 'required',
            'id_membership' => [
                'required',
                Rule::exists('memberships','id')
            ],
            'alamat_customer' => 'required',
        ]);

        if($validated->fails()){
            return redirect()->back()->withErrors($validated);
        }
        $customer = Customer::find($id);
        $customer->nama_customer = $r->nama_customer;
        $customer->id_membership = $r->id_membership;
        $customer->alamat_customer = $r->alamat_customer;
        $customer->save();

        return redirect()->route('admin.customerRead');
    }
}
