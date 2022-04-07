<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function index($X) {
    //     dd($X);
    //     // return view('profil',[
    //     //     'id_user' => $id_user
    //     // ]);
    // }
    // // public function index() {
    // //     return view('profil');
    // // }

    public function create(Request $req) {
        $valid = $req->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric',
            'id_user' => "required",
            'foto_profil' => 'max:255',
        ]);
        Customer::create($valid);
        return redirect('/');
    }
}
