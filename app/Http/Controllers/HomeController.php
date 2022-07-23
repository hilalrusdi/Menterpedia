<?php

namespace App\Http\Controllers;

use App\Models\Pengajar;
use Illuminate\Http\Request;
use App\Http\Controllers\AdvertisementController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
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
