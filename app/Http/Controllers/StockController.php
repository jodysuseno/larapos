<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Item;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StockController extends Controller
{
    public function stockIn()
    {
        // $stock = Stock::all()->where('type', '=', 'in');
        // dd($stock);

        $stock = DB::table('stocks')
            ->join('items', 'stocks.item_id', '=', 'items.item_id')
            ->join('suppliers', 'stocks.supplier_id', '=', 'suppliers.supplier_id')
            ->join('users', 'stocks.user_id', '=', 'users.id')
            ->where('stocks.type', '=', 'in')
            ->select(
                'stocks.*', 
                'items.barcode as item_barcode', 
                'items.name as product_item',
                'suppliers.name as supplier_name')
            ->orderByRaw('created_at DESC')
            ->get();
        return view('stock.stockIndex', [
            'title' => 'Stock In',
            'icon' => 'fa fa-plus',
            'stocks' => $stock
        ]);
    }

    public function stockInAdd(){
        return view('stock.stockInAdd', [
            'title' => 'Add Stock',
            'icon' => 'fa fa-plus',
            'suppliers' => DB::table('suppliers')->get(),
            'items' => DB::table('items')->join('units', 'items.unit_id', '=', 'units.unit_id')->select('items.*', 'units.name as unit_name')->get(),
        ]);
    }

    public function stockInStore(Request $request){

        $request->validate([
            'item_id' => 'required',
            'supplier_id' => 'required',
            'qty' => 'required',
            'detail' => 'required',
            'date' => 'required',
        ]);
        
        Stock::create([
            'item_id' => $request->item_id,
            'supplier_id' => $request->supplier_id,
            'user_id' => auth()->user()->id,
            'type' => 'in',
            'detail' => $request->detail,
            'qty' => $request->qty,
            'date' => Carbon::parse(date('Y-m-d')),
        ]);

        $item = Item::where('item_id', $request->item_id)->first();
        Item::where('item_id', $request->item_id)->update([
            'stock'=> $item->stock + $request->qty
        ]);

        return redirect()->route('stock-in')->with('status','Item has been Stock In!.');
    }

    public function stockInDestroy($id){
        $stock = Stock::where('stock_id', $id)->first();
        $item = Item::where('item_id', $stock->item_id)->first();
        Item::where('item_id', $stock->item_id)->update([
            'stock'=> $item->stock - $stock->qty
        ]);
        Stock::where('stock_id',$id)->delete();
        return redirect()->route('stock-in')->with('status','Stock In has been deleted!.');
    }


    public function stockOut()
    {
        $stock = DB::table('stocks')
            ->join('items', 'stocks.item_id', '=', 'items.item_id')
            ->join('users', 'stocks.user_id', '=', 'users.id')
            ->where('stocks.type', '=', 'out')
            ->select(
                'stocks.*', 
                'items.barcode as item_barcode', 
                'items.name as product_item')
            ->orderByRaw('date DESC')
            ->get();
        return view('stock.stockIndex', [
            'title' => 'Stock Out',
            'icon' => 'fa fa-minus',
            'stocks' => $stock
        ]);
    }

    public function stockOutAdd(){
        return view('stock.stockOutAdd', [
            'title' => 'Add Stock Out',
            'icon' => 'fa fa-minus',
            'items' => DB::table('items')->join('units', 'items.unit_id', '=', 'units.unit_id')->select('items.*', 'units.name as unit_name')->get(),
        ]);
    }

    public function stockOutStore(Request $request){

        // dd($request);
        $stck = Item::where('item_id', $request->item_id)->first();

        $request->validate([
            'item_id' => 'required',
            'qty' => 'required|lte:'.$stck->stock,
            'detail' => 'required',
            'date' => 'required',
        ]);
        
        Stock::create([
            'item_id' => $request->item_id,
            'supplier_id' => null,
            'user_id' => auth()->user()->id,
            'type' => 'out',
            'detail' => $request->detail,
            'qty' => $request->qty,
            'date' => Carbon::parse(date('Y-m-d')),
        ]);

        $item = Item::where('item_id', $request->item_id)->first();
        Item::where('item_id', $request->item_id)->update([
            'stock'=> $item->stock - $request->qty
        ]);

        return redirect()->route('stock-out')->with('status','Item has been Stock Out!.');
    }

    public function stockOutDestroy($id){
        $stock = Stock::where('stock_id', $id)->first();
        $item = Item::where('item_id', $stock->item_id)->first();
        Item::where('item_id', $stock->item_id)->update([
            'stock'=> $item->stock + $stock->qty
        ]);
        Stock::where('stock_id',$id)->delete();
        return redirect()->route('stock-in')->with('status','Stock In has been deleted!.');
    }

    public function report(Request $request){
        $first_date = $request->input('first_date', false);
        $last_date = $request->input('last_date', false);

        // dd(date_format(date_create($first_date), "Y-m-d"),date_format(date_create($last_date), "Y-m-d"));
        
        if ($first_date && $last_date) {
            $stock_in = DB::table('stocks')
                ->join('items', 'stocks.item_id', '=', 'items.item_id')
                ->join('suppliers', 'stocks.supplier_id', '=', 'suppliers.supplier_id')
                ->join('users', 'stocks.user_id', '=', 'users.id')
                ->where('stocks.type', '=', 'in')
                ->whereBetween('stocks.date', [ Carbon::createFromFormat('d/m/Y', $first_date)->format('Y-m-d') , Carbon::createFromFormat('d/m/Y', $last_date)->format('Y-m-d')])
                ->select(
                    'stocks.*', 
                    'items.barcode as item_barcode', 
                    'items.name as product_item',
                    'suppliers.name as supplier_name')
                ->orderByRaw('created_at DESC')
                ->get();

            $stock_out = DB::table('stocks')
                ->join('items', 'stocks.item_id', '=', 'items.item_id')
                ->join('users', 'stocks.user_id', '=', 'users.id')
                ->where('stocks.type', '=', 'out')
                ->whereBetween('stocks.date', [ Carbon::createFromFormat('d/m/Y', $first_date)->format('Y-m-d') , Carbon::createFromFormat('d/m/Y', $last_date)->format('Y-m-d')])
                ->select(
                    'stocks.*', 
                    'items.barcode as item_barcode', 
                    'items.name as product_item')
                ->orderByRaw('date DESC')
                ->get();
        } else {
            $stock_in = DB::table('stocks')
                ->join('items', 'stocks.item_id', '=', 'items.item_id')
                ->join('suppliers', 'stocks.supplier_id', '=', 'suppliers.supplier_id')
                ->join('users', 'stocks.user_id', '=', 'users.id')
                ->where('stocks.type', '=', 'in')
                ->select(
                    'stocks.*', 
                    'items.barcode as item_barcode', 
                    'items.name as product_item',
                    'suppliers.name as supplier_name')
                ->orderByRaw('created_at DESC')
                ->get();

            $stock_out = DB::table('stocks')
                ->join('items', 'stocks.item_id', '=', 'items.item_id')
                ->join('users', 'stocks.user_id', '=', 'users.id')
                ->where('stocks.type', '=', 'out')
                ->select(
                    'stocks.*', 
                    'items.barcode as item_barcode', 
                    'items.name as product_item')
                ->orderByRaw('date DESC')
                ->get();
        }

        

        return view('stock.stockReport', [
            'title' => 'Stock Report',
            'icon' => 'fa fa-file-text',
            'stockIns' => $stock_in,
            'stockOuts' => $stock_out
        ]);
    }

    public function stockInPdf()
    {
        $sales = DB::table('stocks')
            ->join('items', 'stocks.item_id', '=', 'items.item_id')
            ->join('suppliers', 'stocks.supplier_id', '=', 'suppliers.supplier_id')
            ->join('users', 'stocks.user_id', '=', 'users.id')
            ->where('stocks.type', '=', 'in')
            ->select(
                'stocks.*', 
                'items.barcode as item_barcode',
                'items.name as product_item',
                'suppliers.name as supplier_name')
            ->orderByRaw('created_at DESC')
            ->get();

        $pdf = PDF::loadview('stock.stocks_print',[
            'title' => 'Stock In',
            'date' => Carbon::now()->format('d F Y'),
            'sales'=>$sales
            ])->setPaper('A4','potrait');
        return $pdf->stream();
    }

    public function stockOutPdf()
    {
        $sales = DB::table('stocks')
            ->join('items', 'stocks.item_id', '=', 'items.item_id')
            ->join('users', 'stocks.user_id', '=', 'users.id')
            ->where('stocks.type', '=', 'out')
            ->select(
                'stocks.*', 
                'items.barcode as item_barcode', 
                'items.name as product_item')
            ->orderByRaw('date DESC')
            ->get();
        

        $pdf = PDF::loadview('stock.stocks_print',[
            'title' => 'Stock Out',
            'date' => Carbon::now()->format('d F Y'),
            'sales'=>$sales
            ])->setPaper('A4','potrait');
        return $pdf->stream();
    }

    public function filterReport(Request $request){
        $first_date = Carbon::parse($request->first_date)->format('d/m/Y');
        $last_date = Carbon::parse($request->last_date)->format('d/m/Y');

        return redirect('/stock-report?first_date='.$first_date.'&last_date='.$last_date);
    }
}
