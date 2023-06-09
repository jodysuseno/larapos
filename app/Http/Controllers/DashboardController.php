<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\Customer;
use App\Models\Setting;
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

    public function profileUpload(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $update_picture = User::findOrFail(auth()->user()->id)->first();

        $imageName = $update_picture->name . '-' . time() . '.' . $request->profile_picture->extension();
        $request->profile_picture->move(public_path('images'), $imageName);

        $image = Image::make($request->profile_picture->getRealPath())->fit(500, 500);
        $image->save(public_path('images'), $imageName);

        $update_picture->profile_picture = $imageName;
        $update_picture->save();

        return redirect()->back()->with('success', 'Picture has been uploaded!.');
    }

    public function configuration()
    {
        return view('configuration', [
            'title' => 'Configure Setting',
            'icon' => 'fa fa-gear',
            'setting' => Setting::findOrFail(1)->first()
        ]);
    }

    public function configuration_update(Request $request)
    {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'contact' => 'required',
            'owner' => 'required',
            'descrpition' => 'max:200',
        ]);


        Setting::where('id', 1)->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'owner' => $request->owner,
            'description' => $request->description,
        ]);

        return redirect()->route('configuration')->with('status', 'Configuration has been changed!');
    }
}
