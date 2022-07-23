<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index() {
        return view('admin.login');
    }

    public function login(Request $req) {
        $credentials = $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $pass = '$2y$10$qQ/TM2btBSyhd2BJgyqfNe.wISTJdZD5iYL6eVvN/6ZDZVRatW3xm';
        if ($credentials['username'] == 'ikiadmin' ) {
            if (Hash::check($credentials['password'], $pass)) {
                $tkn = 'wISTJdZD5iYL6eVvN/6ZDZVRatW3xm';
                return view('admin.home',['tkn'=>$tkn]);
            }
        }
    }

    public function home(Request $req) {
        if ($req->tkn == 'wISTJdZD5iYL6eVvN/6ZDZVRatW3xm') {
            return view('admin.home',['tkn'=>$req->tkn]);
        }
        else {
            return $this->index();
        }
    }

    public function getPengajar($id) {
        $data = Pengajar::where('id',$id)->get();
        foreach ($data as $data) {
        }
        return $data;
    }

    public function getUserPengajar($id) {
        $data1 = User::where('id',$id)->get();
        foreach ($data1 as $data1) {
        }
        return $data1;
    }

    public function verifikasi(Request $req) {
        if ($req->tkn == 'wISTJdZD5iYL6eVvN/6ZDZVRatW3xm') {
            $data = Pengajar::where('status_akun','unverified')->get();
            return view('admin.verif',['tkn'=>$req->tkn,'data'=>$data]);
        }
        else {
            return $this->index();
        }
    }

    public function detailsProfil(Request $req) {
        if ($req->tkn == 'wISTJdZD5iYL6eVvN/6ZDZVRatW3xm') {
            $data = $this->getPengajar($req->id_user);
            $data1 = $this->getUserPengajar($req->id);
            
            return view('admin.profilformadmin', ['tkn' => $req->tkn, 'data' => $data, 'data1' => $data1]);
        }
        else {
            return $this->index();
        }
    }

    public function aprove(Request $req) {
        if ($req->tkn == 'wISTJdZD5iYL6eVvN/6ZDZVRatW3xm') {
            Pengajar::where('id',$req->id)->update(['status_akun' => 'Verified']);
            $data = $this->getPengajar($req->id_user);
            $data1 = $this->getUserPengajar($req->id);
            return view('admin.profilformadmin', ['tkn' => $req->tkn, 'data' => $data, 'data1' => $data1]); 
        }
        else {
            return $this->index();
        }
    }

    public function add(Request $req){
        
    }
    public function Report(Request $req){

    }

}
