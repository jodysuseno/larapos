<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Unit;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        // $items = Item::all();
        $items = DB::table('items')
            ->join('categories', 'items.category_id', '=', 'categories.category_id')
            ->join('units', 'items.unit_id', '=', 'units.unit_id')
            ->select('items.*', 'categories.name as catname', 'units.name as unitname')
            ->orderByRaw('barcode DESC')
            ->get();
        // dd($items);


        return view('item.itemIndex', [
            'title' => 'Item',
            'icon' => 'fa fa-archive',
            'items' => $items
        ]);
    }

    public function create()
    {

        $category = Category::all();
        $unit = Unit::all();

        return view('item.itemCreate', [
            'title' => 'Item',
            'icon' => 'fa fa-archive',
            'categories' => $category,
            'units' => $unit
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'barcode' => 'required|string|max:255|unique:items',
            'name' => 'required|string|max:255|unique:items',
            'category_id' => 'required',
            'unit_id' => 'required',
            'price' => 'required|numeric'
        ]);

        Item::create([
            'barcode' => $request->barcode,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'price' => $request->price,
            'stock' => 0
        ]);

        return redirect()->route('item.index')->with('status', 'Item has been created');
    }

    public function edit($id)
    {
        $item = Item::where('item_id', $id)->first();
        $category = Category::all();
        $unit = Unit::all();

        return view('item.itemEdit', [
            'title' => 'Item',
            'icon' => 'fa fa-archive',
            'item' => $item,
            'categories' => $category,
            'units' => $unit
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Item::where('item_id', $id)->first();

        if ($item->barcode != $request->barcode && $item->name != $request->name) {
            $request->validate([
                'barcode' => 'required|string|max:255|unique:items',
                'name' => 'required|string|max:255|unique:items',
            ]);
        }
        if ($item->barcode != $request->barcode) {
            $request->validate([
                'barcode' => 'required|string|max:255|unique:items',
            ]);
        }
        if ($item->name != $request->name) {
            $request->validate([
                'name' => 'required|string|max:255|unique:items',
            ]);
        }

        $request->validate([
            'barcode' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'category_id' => 'required',
            'unit_id' => 'required',
            'price' => 'required|numeric'
        ]);

        Item::where('item_id', $id)
            ->update([
                'barcode' => $request->barcode,
                'name' => $request->name,
                'category_id' => $request->category_id,
                'unit_id' => $request->unit_id,
                'price' => $request->price
            ]);

        return redirect()->route('item.index')->with('status', 'Item has been updated!');
    }

    public function destroy($id)
    {
        // Hapus items yang berhubungan dengan categories
        DB::table('stocks')
            ->where('item_id', $id)
            ->delete();

        // Hapus categories
        DB::table('items')
            ->where('item_id', $id)
            ->delete();

        return redirect()->route('item.index')->with('status', 'Item has been deleted!');
    }
}
