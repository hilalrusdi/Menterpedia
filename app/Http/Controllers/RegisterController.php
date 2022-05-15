<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Registered;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index() {
        return view('create_account1');
    }

    public function store(Request $req) {
        $validateddata=$req->validate([
            'name'=> 'required|email|unique:users,name',
            'email' => 'required|email|same:email',
            'password' => 'required|min:5|max:255',
            'user_role' => 'required',
            'confirmation-password' => 'required|min:5|max:255|same:password'
        ]);

        $validateddata['password'] = Hash::make($validateddata['password']);
        User::create($validateddata);
        $user= $validateddata;
        event(new Registered($user));
        return redirect('/login');
        
    }

    public function index2() {
        return view('create_account2');
    }

    // public function store2(Request $req) {
    //     $validateddata=$req->validate([
    //         'name'=> 'required|email|unique:users,name',
    //         'email' => 'required|email|same:email',
    //         'password' => 'required|min:5|max:255',
    //         'user_role' => 'required',
    //         'confirmation-password' => 'required|min:5|max:255|same:password'
    //     ]);

    //     $validateddata['password'] = Hash::make($validateddata['password']);
    //     User::create($validateddata);
    //     return redirect('/login');
        
    // }
}
