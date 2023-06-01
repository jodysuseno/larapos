<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.supplierIndex',
        [
            'title' => 'Suppliers',
            'icon' => 'fa fa-industry',
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('supplier.supplierCreate',
        [
            'title' => 'Create Suppliers',
            'icon' => 'fa fa-industry',
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
            'name' => 'required|max:255|unique:suppliers',
            'phone' => 'required|digits:12',
            'address' => 'required',
        ]);
        
        Supplier::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'desc' => $request->desc
        ]);

        return redirect()->route('supplier.index')->with('status','Supplier has been created!.');
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
        $supplier = Supplier::where('supplier_id',$id)->first();
        return view('supplier.supplierEdit',
            [
                'title' => 'Update Supplier',
                'icon' => 'fa fa-factory',
                'supplier' => $supplier
            ]
        );
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
        $supplier = Supplier::where('supplier_id',$id)->first();

        if ($supplier->name != $request->name) {
            $request->validate([
                'name' => 'required|max:255|unique:suppliers',
            ]);
        }

        $request->validate([
            'name' => 'required|max:255',
            'phone' => 'required|digits:12',
            'address' => 'required',
        ]);

        Supplier::where('supplier_id', $id)
            ->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'desc' => $request->desc
            ]);
            
        return redirect()->route('supplier.index')->with('status','Supplier has been Edited!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::where('supplier_id',$id)->delete();
        
        return redirect()->route('supplier.index')->with('status','Supplier has been deleted!');
    }
}
