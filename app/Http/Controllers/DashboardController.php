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
        return view(
            'dashboard',
            [
                'title' => 'Dashboard',
                'icon' => 'fa fa-dashboard',
                'count_item' => Item::all()->count(),
                'count_supplier' => Supplier::all()->count(),
                'count_customer' => Customer::all()->count(),
                'count_user' => User::all()->count(),
            ]
        );
    }

    public function profile()
    {
        return view('profile', [
            'title' => 'Profile',
            'icon' => 'fa fa-user',
            'profile' => auth()->user()
        ]);
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,id,' . auth()->user()->id,
            'username' => 'required|unique:users,id,' . auth()->user()->id,
            'confirm_password' => 'same:password',
            'name' => 'required',
            'address' => 'required',
        ]);


        $user = User::findOrFail(auth()->user()->id);
        $user->email = $request->email;
        $user->username = $request->username;
        $user->name = $request->name;
        $user->address = $request->address;

        if (!is_null($request->password)) {
            $user->password == $request->password;
        }

        $user->save();

        return redirect()->route('profile')->with('status', 'Profile has been updated!');
    }
}
