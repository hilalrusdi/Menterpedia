<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValueDumpController extends Controller
{
    public function index(Request $req) {
        dd($req);
    }

    public function preview() {
        return view('dashboardPengajar.Jadwal.create_sesi');
    }
}
