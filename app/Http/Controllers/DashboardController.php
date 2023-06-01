<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard',
        [
            'title' => 'Dashboard',
            'icon' => 'fa fa-dashboard',
            'count_item' => Item::all()->count(),
            'count_supplier' => Supplier::all()->count(),
            'count_customer' => Customer::all()->count(),
            'count_user' => User::all()->count(),
        ]);
    }


}
