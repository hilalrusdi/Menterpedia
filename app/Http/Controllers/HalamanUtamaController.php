<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;

class HalamanUtamaController extends Controller
{

    public function index() {
        $runclassad = new AdvertisementController();
        $ad = $runclassad->getDataAd();
        return view('home',['ad'=>$ad,'mentor'=> $this->getChanel()]);
    }

    public function getChanel() {
        $mentor = Pengajar::all();
        return $mentor;
    }

}
