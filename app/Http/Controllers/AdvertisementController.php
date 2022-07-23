<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use Illuminate\Support\Facades\Storage;

class AdvertisementController extends Controller
{
    public function control(Request $req) {
        if ($req->tkn == 'wISTJdZD5iYL6eVvN/6ZDZVRatW3xm') {
            $data= $this->getDataAd();
            return view("admin.add",['data' => $data,'tkn' => $req->tkn]);
        } else {
            return view('admin.login');
        }
    }

    public function getDataAd() {
        $data = Advertisement::all();
        return $data;
    }

    public function NewAd(Request $req) {
        if ($req->tkn == 'wISTJdZD5iYL6eVvN/6ZDZVRatW3xm') {
            $credentials = $req->validate([
                'gambar' => 'required|image|file|max:1024',
                'exp_date' => 'required'
            ]);
            $credentials['gambar'] = $req->file('gambar')->store('Advertisement');
            Advertisement::create($credentials);
            $data= $this->getDataAd();
            return view("admin.add",['data' => $data,'tkn' => $req->tkn]);
        }else {
            return view('admin.login');
        }
    }

    public function dlt(Request $req) {
        if ($req->tkn == 'wISTJdZD5iYL6eVvN/6ZDZVRatW3xm') {
            Advertisement::where('id',$req->id)->delete();
            Storage::delete($req->oldImage);
            $data= $this->getDataAd();
            return view("admin.add",['data' => $data,'tkn' => $req->tkn]);
        } else {
            return view('admin.login');
        }
    }
}
