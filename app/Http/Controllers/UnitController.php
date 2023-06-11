<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

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

        return redirect()->route('unit.index')->with('status', 'Unit has been created!.');
    }

    public function edit($id)
    {
        $unit = Unit::where('unit_id', $id)->first();
        return view('unit.unitEdit', [
            'title' => 'Edit unit',
            'icon' => 'fa fa-edit',
            'unit' => $unit
        ]);
    }

    public function update(Request $request, $id)
    {
        $unit = Unit::where('unit_id', $id)->first();

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

        return redirect()->route('unit.index')->with('status', 'Unit has been Edited!.');
    }

    public function destroy($id)
    {
        // Hapus data carts terkait
        DB::table('carts')
            ->whereIn('item_id', function ($query) use ($id) {
                $query->select('item_id')
                    ->from('items')
                    ->where('unit_id', $id);
            })
            ->delete();

        // Hapus stocks yang berhubungan dengan items yang berhubungan dengan categories
        DB::table('stocks')
            ->whereIn('item_id', function ($query) use ($id) {
                $query->select('item_id')
                    ->from('items')
                    ->where('unit_id', $id);
            })
            ->delete();

        // Hapus items yang berhubungan dengan categories
        DB::table('items')
            ->where('unit_id', $id)
            ->delete();

        // Hapus categories
        DB::table('units')
            ->where('unit_id', $id)
            ->delete();
        return redirect()->route('unit.index')->with('status', 'Unit has been Deleted!.');
    }
}
