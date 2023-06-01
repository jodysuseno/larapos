<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();

        return view('customer.customerIndex',
        [
            'title' => 'Customers',
            'icon' => 'fa fa-users',
            'customers' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.customerCreate',
        [
            'title' => 'Create Customers',
            'icon' => 'fa fa-users'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:customers',
            'phone' => 'required|digits:12',
            'address' => 'required',
        ]);
        
        Customer::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address
        ]);

        return redirect()->route('customer.index')->with('status','Customer has been created!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::where('customer_id',$id)->first();
        return view('customer.customerEdit',
        [
            'title' => 'Edit Customers',
            'icon' => 'fa fa-users',
            'customers' => $customer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::where('customer_id',$id)->first();

        if ($customer->name != $request->name) {
            $request->validate([
                'name' => 'required|max:255|unique:customers',
            ]);
        }

        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|digits:12',
            'address' => 'required',
        ]);

        Customer::where('customer_id', $id)
            ->update([
                'name' => $request->name,
                'gender' => $request->gender,
                'phone' => $request->phone,
                'address' => $request->address,
            ]);
            
        return redirect()->route('customer.index')->with('status','Customer has been Edited!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('customer_id',$id)->delete();
        
        return redirect()->route('customer.index')->with('status','Customer has been deleted!');
    }
}
