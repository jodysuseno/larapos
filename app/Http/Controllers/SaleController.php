<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;
use App\Models\Customer;
use App\Models\Item;
use App\Models\Sale;
use App\Models\Cart;
use App\Models\Setting;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class SaleController extends Controller
{

    public function autonumber()
    {
        $q = DB::table('sales')
            ->select(DB::raw('MAX(RIGHT(invoice,5)) as invoice_no'))
            ->whereRaw('MID(invoice,3,6) = DATE_FORMAT(CURDATE(), "%y%m%d")');
        $prx = 'LP' . date('ymd');
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->invoice_no) + 1;
                $kd = $prx . sprintf("%04s", $tmp);
            }
        } else {
            $kd = $prx . "0001";
        }
        return $kd;
    }

    public function index()
    {
        return view('sale.saleIndex', [
            'title' => 'Sales',
            'icon' => 'fa fa-shopping-cart',
            'date_now' => date_format(date_create(date("Y-m-d")), "d/m/Y"),
            'customers' => Customer::all(),
            'items' => Item::orderByDesc('created_at')->get(),
            'invoice' => $this->autonumber()
        ]);
    }

    public function saleProcess(Request $request)
    {

        $request->validate([
            // 'customer_id' => 'required',
            'invoice' => 'required',
            'qty' => 'required',
            'item_id' => 'required',
            'price_item' => 'required',
            'all_total' => 'required',
            'cash' => 'required',
            'change' => 'required'
        ]);

        Sale::create([
            'invoice' => $request->invoice,
            'customer_id' => $request->customer_id,
            'user_id' => auth()->user()->id,
            'total_price' => $request->all_total,
            'cash' => $request->cash,
            'remaining' => $request->change,
            'note' => $request->note,
            'date' => date('Y-m-d')
        ]);

        $sale_id = Sale::where('invoice', $request->invoice)->first();

        foreach ($request->item_id as $key => $value) {
            $item_id_key = $request->item_id[$key];
            $qty_key = $request->qty[$key];
            $price_key = $request->price_item[$key];

            Cart::create([
                'sale_id' => $sale_id->sale_id,
                'item_id' => $item_id_key,
                'qty' => $qty_key,
                'price_item' => $price_key
            ]);

            $stck = Item::where('item_id', $item_id_key)->first();

            $stk = $stck->stock - $qty_key;

            Item::where('item_id', $item_id_key)->update([
                'stock' => $stk
            ]);
        }

        return redirect()->route('sale.page-invoice', $sale_id->sale_id);
    }

    public function printInvoice($id)
    {
        $sale = DB::table('sales')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->join('customers', 'customers.customer_id', '=', 'sales.customer_id')
            ->select(
                'sales.*',
                'users.name as cashier_name',
                'customers.name as customer_name',
                'sales.created_at as date_at'
            )
            ->where('sales.sale_id', $id)
            ->first();

        $cart = DB::table('carts')
            ->join('items', 'items.item_id', '=', 'carts.item_id')
            ->select(
                'carts.*',
                'items.name as product_name',
                'carts.qty as qty_product',
                'carts.price_item as total_product'
            )
            ->where('carts.sale_id', $id)
            ->get();

        return view('sale.page-invoice', [
            'title' => 'Invoice',
            'icon' => 'fa fa-file-text',
            'sale' => $sale,
            'carts' => $cart
        ]);
    }

    public function report(Request $request)
    {
        $get_month = $request->input('get_month', false);
        $get_cshr = $request->input('get_cshr', false);

        // dd([$get_month,$get_cshr]);
        // $get_month = $request->month;
        if (empty($get_month)) {
            $get_month = Carbon::now()->month;
        } else {
            $get_month = Carbon::createFromFormat('Y-m', $get_month);
        }

        // $get_cshr = $request->user_id;
        if (empty($get_cshr)) {
            $user = array();
            foreach (User::all() as $value) {
                $user[] = $value->id;
            }
            $get_cshr = $user;
        } else {
            $user = array();
            $user[] = $get_cshr;
            $get_cshr = $user;
        }

        $sales = DB::table('sales')
            ->join('customers', 'customers.customer_id', '=', 'sales.customer_id')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->select('sales.*', 'customers.name as customer_name', 'users.name as cashier_name')
            ->whereIn('user_id', $get_cshr)
            ->whereMonth('date', $get_month)
            ->orderBy('sales.created_at', 'desc')->get();


        return view('sale.saleReport', [
            'title' => 'Sales Report',
            'icon' => 'fa fa-file-text',
            'sales' => $sales,
            'cashier' => User::orderByDesc('created_at')->get(),
        ]);
    }

    public function dateFilter(Request $request)
    {
        $get_month = $request->input('month', false);
        $get_cshr = $request->input('user_id', false);

        return redirect('/sale-report?get_month=' . $get_month . '&get_cshr=' . $get_cshr);
    }

    public function salePdf(Request $request)
    {
        $get_month = $request->input('get_month');
        $get_cshr = $request->input('get_cshr');

        if (empty($get_month)) {
            $get_month = Carbon::now()->month;
        } else {
            $get_month = Carbon::createFromFormat('Y-m', $get_month);
        }

        if (empty($get_cshr)) {
            $user = array();
            foreach (User::all() as $value) {
                $user[] = $value->id;
            }
            $get_cshr = $user;
        } else {
            $user = array();
            $user[] = $get_cshr;
            $get_cshr = $user;
        }

        $sales = DB::table('sales')
            ->join('customers', 'customers.customer_id', '=', 'sales.customer_id')
            ->join('users', 'users.id', '=', 'sales.user_id')
            ->select('sales.invoice', 'sales.date', 'customers.name as customer_name', 'users.name as cashier_name', 'sales.total_price')
            ->whereIn('user_id', $get_cshr)
            ->whereMonth('date', $get_month)
            ->orderBy('sales.created_at', 'desc')->get();

        $pdf = PDF::loadview('sale.sales_print', [
            'sales' => $sales,
            'date' => Carbon::now(),
            'name_shop' => Setting::first()->name,
            'phone' => Setting::first()->contact,
        ])->setPaper('A4', 'potrait');
        return $pdf->stream();
    }
}
