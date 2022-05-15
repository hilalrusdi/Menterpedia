<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Pengajar;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


    public function create(Request $req) {
        $valid = $req->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric',
            'id_user' => "required",
            'foto_profil' => 'image|file|max:1024',
        ]);

        if($req->file('foto_profil')) {
            $valid['foto_profil'] = $req->file('foto_profil')->store('profile-pictures');
        }

        Customer::create($valid);
        return redirect('/');
    }

    public function create2(Request $req) {
        $valid = $req->validate([
            'nama'              =>'required|max:255',
            'tl'                =>'required',
            'alamat'            =>'required',
            'domisisli'         =>'required',
            'biodata'           =>'required',
            'scan_ktp'          =>'required',
            'scan_ijazah'       =>'required',
            'transkrip_nilai'   =>'required',
            'account_status'    =>'required'
        ]);
        Pengajar::create($valid);
        return redirect('/');
    }
}
