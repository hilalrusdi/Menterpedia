<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\DetailKategori;
use App\Models\SesiPembelajaran;
use App\Models\DetailMediaBelajar;
use Illuminate\Support\Facades\Auth;

class PembelajaranController extends Controller
{
    public function MenambahSesi() {
        return view("dashboardPengajar.Jadwal.create_sesi");
    }

    public function setJadwal(Request $req) {
        $credentials = $req->validate([
            'harga'         => 'required',
            'tanggal'       => 'required',
            'jam'           => 'required',
            'kt'            => 'required',
            'mb'            => 'required',
            'link'          => 'required',
            'deskripsi'     => 'required',
            'status_jadwal' => 'required',
        ]);

        $date = $credentials['tanggal'];
        $time = $credentials['jam'];

        $combineDT = date('Y-m-d H:i:s', strtotime("$date $time"));

        $sesiPembelajaran = new SesiPembelajaran;
        $sesiPembelajaran->id_pengajar = Auth::user()->id;
        $sesiPembelajaran->harga = $credentials['harga'];
        $sesiPembelajaran->jadwal = $combineDT;
        $sesiPembelajaran->deskripsi = $credentials['deskripsi'];
        $sesiPembelajaran->status_jadwal = $credentials['status_jadwal'];
        $sesiPembelajaran->save();

        foreach ($credentials['kt'] as $datakt) {
            $kategori = new DetailKategori;
            $kategori->id_jadwal = $sesiPembelajaran->id;
            $kategori->id_kategori = $datakt;
            $kategori->save();
        }

        $generate = $credentials['link'];
        if ($generate[0]===null) {
            array_splice($generate,0,1);
        }

        $count=0;
        foreach ($credentials['mb'] as $datamb) {
            $mediaBelajar = new DetailMediaBelajar;
            $mediaBelajar->id_sesiPembelajaran = $sesiPembelajaran->id;
            $mediaBelajar->nama_media = $datamb;
            $mediaBelajar->link_media = $generate[$count];
            $mediaBelajar->save();
            $count =+ 1;
        }

        $back = new DashboardMController;
        return $back->jadwal();
    }

    public function getJadwalById() {
        $dataJadwal = SesiPembelajaran::where('id_pengajar',Auth::user()->id)->get();
        return $dataJadwal;
    }

    public function getKategoriById() {
        $dataJadwal = SesiPembelajaran::where('id_pengajar',Auth::user()->id)->get();
        $dataKategori = [];
        foreach ($dataJadwal as $key ) {
            $detailkategori = DetailKategori::where('id_jadwal',$key->id)->get();
            foreach ($detailkategori as $value) {
                $kategori = kategori::find($value->id_kategori);
                $rawArray = [$key->id,$kategori->nama_kategori];
                array_push($dataKategori,$rawArray);
            }
        }
        // dd($dataKategori);
        return $dataKategori;
    }

    public function getMediaBelajarById() {
        $dataJadwal = SesiPembelajaran::where('id_pengajar',Auth::user()->id)->get();
        $dataMedia = [];
        foreach ($dataJadwal as $key ) {
            $detailMedia = DetailMediaBelajar::where('id_sesiPembelajaran',$key->id)->get();
            foreach ($detailMedia as $media) {
                $muehehe = [$media->id_sesiPembelajaran,$media->nama_media,$media->link_media];
                array_push($dataMedia,$muehehe);
                // dd($media->nama_media);
            }
        }
        if (isset($detailMedia)) {
            return $dataMedia;
        }
    }

    public function getAllKategori() {
        $kategori = kategori::get();
        return $kategori;
    }

    public function editJadwal(Request $req) {
        $credentials = $req->validate([
            'harga'               => 'required',
            'tanggal'             => 'required',
            'jam'                 => 'required',
            'kt'                  => 'required',
            'mb'                  => 'required',
            'link'                => 'required',
            'deskripsi'           => 'required',
            'status_jadwal'       => 'required',
            'id_sesiPembelajaran' => 'required',
        ]);

        $date = $credentials['tanggal'];
        $time = $credentials['jam'];

        $combineDT = date('Y-m-d H:i:s', strtotime("$date $time"));

        $jadwal = SesiPembelajaran::where('id',$credentials['id_sesiPembelajaran'])->update([
            'harga'         => $credentials['harga'],
            'jadwal'        => $combineDT,
            'deskripsi'     => $credentials['deskripsi'],
            'status_jadwal' => $credentials['status_jadwal']
        ]);

        DetailKategori::where('id_jadwal',$credentials['id_sesiPembelajaran'])->delete();

        foreach ($credentials['kt'] as $datakt) {
            $kategori = new DetailKategori;
            $kategori->id_jadwal = $credentials['id_sesiPembelajaran'];
            $kategori->id_kategori = $datakt;
            $kategori->save();
        }

        DetailMediaBelajar::where('id_sesiPembelajaran',$credentials['id_sesiPembelajaran'])->delete();

        $generate = $credentials['link'];
        if ($generate[0]===null) {
            array_splice($generate,0,1);
        }

        $count=0;
        foreach ($credentials['mb'] as $datamb) {
            $mediaBelajar = new DetailMediaBelajar;
            $mediaBelajar->id_sesiPembelajaran = $credentials['id_sesiPembelajaran'];
            $mediaBelajar->nama_media = $datamb;
            $mediaBelajar->link_media = $generate[$count];
            $mediaBelajar->save();
            $count =+ 1;
        }


        $back = new DashboardMController;
        return $back->jadwal();
    }
}
