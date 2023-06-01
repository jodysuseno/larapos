<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index()
    {
        $categories = Unit::all();
        return view('unit.unitIndex', [
            'title' => 'Unit',
            'icon' => 'fa fa-list',
            'unit' => $categories
        ]);
    }

    public function create()
    {
        return view('unit.unitCreate', [
            'title' => 'Create unit',
            'icon' => 'fa fa-plus'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:units'
        ]);
        
        Unit::create([
            'name' => $request->name,
        ]);

        return redirect()->route('unit.index')->with('status','Unit has been created!.');
    }

    public function edit($id)
    {
        $unit = Unit::where('unit_id',$id)->first();
        return view('unit.unitEdit', [
            'title' => 'Edit unit',
            'icon' => 'fa fa-edit',
            'unit' => $unit
        ]);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::where('unit_id',$id)->first();

        if ($unit->name != $request->name) {
            $request->validate([
                'name' => 'required|max:255|unique:units',
            ]);
        }

        $request->validate([
            'name' => 'required|max:255'
        ]);

        Unit::where('unit_id', $id)
            ->update([
                'name' => $request->name
            ]);
            
        return redirect()->route('unit.index')->with('status','Unit has been Edited!.');
    }

    public function destroy($id)
    {
        Unit::where('unit_id', $id)->delete();
        return redirect()->route('unit.index')->with('status','Unit has been Deleted!.');
    }
}
