<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.categoryIndex', [
            'title' => 'Categories',
            'icon' => 'fa fa-list',
            'category' => $categories
        ]);
    }

    public function create()
    {
        return view('category.categoryCreate', [
            'title' => 'Create Category',
            'icon' => 'fa fa-plus'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories'
        ]);
        
        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('category.index')->with('status','Category has been created!.');
    }

    public function edit($id)
    {
        $category = Category::where('category_id',$id)->first();
        return view('category.categoryEdit', [
            'title' => 'Edit Category',
            'icon' => 'fa fa-edit',
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::where('category_id',$id)->first();

        if ($category->name != $request->name) {
            $request->validate([
                'name' => 'required|max:255|unique:categories',
            ]);
        }

        $request->validate([
            'name' => 'required|max:255'
        ]);

        Category::where('category_id', $id)
            ->update([
                'name' => $request->name
            ]);
            
        return redirect()->route('category.index')->with('status','Category has been Edited!.');
    }

    public function destroy($id)
    {
        // Hapus data carts terkait
        DB::table('carts')
            ->whereIn('item_id', function ($query) use ($id) {
                $query->select('item_id')
                    ->from('items')
                    ->where('category_id', $id);
            })
            ->delete();
        // Hapus stocks yang berhubungan dengan items yang berhubungan dengan categories
        DB::table('stocks')
            ->whereIn('item_id', function ($query) use ($id) {
                $query->select('item_id')
                    ->from('items')
                    ->where('category_id', $id);
            })
            ->delete();

        // Hapus items yang berhubungan dengan categories
        DB::table('items')
            ->where('category_id', $id)
            ->delete();

        // Hapus categories
        DB::table('categories')
            ->where('category_id', $id)
            ->delete();
        return redirect()->route('category.index')->with('status','Category has been Deleted!.');
    }
}
