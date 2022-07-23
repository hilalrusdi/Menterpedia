<?php

namespace App\Http\Controllers;

use App\Models\SesiPembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardMController extends Controller
{
    public function jadwal() {
        $pengajar = new ProfileController;
        $data = $pengajar->getProfilPengajar(Auth::user()->id);
        if (isset($data->nama)) {
            $jadwal = new PembelajaranController2;
            $detailJadwal = $jadwal->getJadwal($data->id);
            if(isset($detailJadwal->id)) {
                return view("dashboardPengajar.Jadwal.main",[
                    'pengajar'=>$data,
                    'jadwal'=>$detailJadwal,
                    'mediabelajar'=>$jadwal->getMedia($detailJadwal->id),
                    'datetime' =>$jadwal->getDate($detailJadwal->id),
                    'kategoriJadwal' => $jadwal->getKategori($detailJadwal->id),
                    'kategori' => $jadwal->getAllKategori()
                ]);
            } else {
                return view("dashboardPengajar.Jadwal.main",[
                    'pengajar'=>$data,
                    'jadwal' => $detailJadwal,
                    'kategori' => $jadwal->getAllKategori()
                ]);
            }
        } else {
            $Bypass = new ProfileController;
            return $Bypass->index();
        }
    }

    public function penarikan() {
        return view('ratingcomment.penarikan');
    }
}
