<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view(
            'user.userIndex',
            [
                'title' => 'User',
                'icon' => 'fa fa-user',
                'users' => $users
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(
            'user.userCreate',
            [
                'title' => 'Create User',
                'icon' => 'fa fa-user'
            ]
        );
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
            'email' => 'required|email|max:255|unique:users',
            'username' => 'required|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'name' => 'required|max:255',
            'address' => 'max:200',
            'level' => 'required',
        ]);

        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'name' => $request->name,
            'address' => $request->address,
            'level' => $request->level,
        ]);

        return redirect()->route('user.index')->with('status', 'User has been created!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::where('id',$id)->first();
        // return view('user.userEdit',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        return view(
            'user.userEdit',
            [
                'title' => 'Update User',
                'icon' => 'fa fa-user',
                'user' => $user
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
        $user = User::where('id', $id)->first();

        if ($user->email != $request->email) {
            $request->validate([
                'email' => 'required|email|max:255|unique:users',
            ]);
        }

        if ($user->username != $request->username) {
            $request->validate([
                'username' => 'required|max:255|unique:users',
            ]);
        }

        if (!empty($request->password)) {
            $request->validate([
                'password' => 'required|min:6|confirmed',
                'password_confirmation' => 'required|min:6',
            ]);
        }

        $request->validate([
            'email' => 'required|email|max:255',
            'username' => 'required|max:255',
            'name' => 'required|max:255',
            'address' => 'max:200',
            'level' => 'required',
        ]);

        if (empty($request->password)) {
            User::where('id', $id)
                ->update([
                    'email' => $request->email,
                    'username' => $request->username,
                    'name' => $request->name,
                    'address' => $request->address,
                    'level' => $request->level
                ]);
        } else {
            User::where('id', $id)
                ->update([
                    'email' => $request->email,
                    'username' => $request->username,
                    'password' => bcrypt($request->password),
                    'name' => $request->name,
                    'address' => $request->address,
                    'level' => $request->level,
                ]);
        }

        return redirect()->route('user.index')->with('status', 'User has been updated!.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Menghapus penjualan yang terkait
        DB::table('sales')
            ->whereIn('cart_id', function ($query) use ($id) {
                $query->select('cart_id')
                    ->from('carts')
                    ->where('user_id', $id);
            })->delete();

        // Menghapus keranjang belanja yang terkait
        DB::table('carts')
            ->where('user_id', $id)
            ->delete();

        // Hapus pemasok yang terkait dengan pengguna
        DB::table('suppliers')
            ->where('user_id', $id)
            ->delete();

        // Hapus pengguna
        DB::table('users')
            ->where('user_id', $id)
            ->delete();

        return redirect()->route('user.index')->with('status', 'User has been deleted!');
    }
}
