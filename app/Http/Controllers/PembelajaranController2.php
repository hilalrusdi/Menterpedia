<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\DetailKategori;
use App\Models\SesiPembelajaran;
use App\Models\DetailMediaBelajar;
use Illuminate\Support\Facades\Auth;

class PembelajaranController2 extends Controller
{
    
    Public function setJadwal(Request $req) {
        $credentials = $req->validate([
            'harga'     => 'required|integer|min:0',
            'kt'        => 'required',
            'mb'        => 'required',
            'link'      => 'required',
            'deskripsi' => 'required',
            "id_penagajar" => "required"
        ]);

        $sesiPembelajaran = new SesiPembelajaran;
        $sesiPembelajaran->id_pengajar = $credentials['id_penagajar'] ;
        $sesiPembelajaran->harga = $credentials['harga'];
        $sesiPembelajaran->deskripsi = $credentials['deskripsi'];
        $sesiPembelajaran->save();

        $this->setKategori($sesiPembelajaran->id,$credentials['kt']);
        $this->setMedia($sesiPembelajaran->id,$credentials['mb'],$credentials['link']);

        $back = new DashboardMController;
        return $back->jadwal();

    }

    public function setKategori($id_jadwal,$id_kategori) {
        foreach ($id_kategori as $datakt) {
            $kategori = new DetailKategori;
            $kategori->id_jadwal = $id_jadwal;
            $kategori->id_kategori = $datakt;
            $kategori->save();
        }
        return ;
    }

    public function setMedia($id_sesiPembelajaran,$media,$link) {
        $generate = $link;
        if ($generate[0]===null) {
            array_splice($generate,0,1);
        }

        $count=0;
        foreach ($media as $datamb) {
            $mediaBelajar = new DetailMediaBelajar;
            $mediaBelajar->id_sesiPembelajaran = $id_sesiPembelajaran;
            $mediaBelajar->nama_media = $datamb;
            $mediaBelajar->link_media = $generate[$count];
            $mediaBelajar->save();
            $count =+ 1;
        }
        return ;
    }

    public function setDate(Request $req) {
        $credentials = $req->validate([
            'tanggal'              => 'required',
            'jam'                  => 'required',
            'id_sesiPembelajaran'  => 'required',
            'status_jadwal'        => 'required'
        ]);

        $date = $credentials['tanggal'];
        $time = $credentials['jam'];

        $combineDT = date('Y-m-d H:i:s', strtotime("$date $time"));

        $jadwal = new Jadwal();
        $jadwal->id_sesiPembelajaran = $credentials['id_sesiPembelajaran'];
        $jadwal->datetime = $combineDT;
        $jadwal->status_jadwal = $credentials['status_jadwal'];
        $jadwal->save();

        $back = new DashboardMController;
        return $back->jadwal();
    }

    public function getJadwal($id_pengajar) {
        $data = SesiPembelajaran::where('id_pengajar',$id_pengajar)->get();
        foreach ($data as $data) {
        }
        return $data;
    }

    public function getJadwalbyId($id) {
        $data = SesiPembelajaran::find($id);
        return $data;
    }

    public function getDate($id_sesiPembelajaran) {
        $data = Jadwal::where('id_sesiPembelajaran',$id_sesiPembelajaran)->get();
        return $data;
    }

    public function getDateAvail($id_sesiPembelajaran) {
        $array = ['id_sesiPembelajaran'=>$id_sesiPembelajaran,'status_jadwal' => 'aktif'];
        $data =Jadwal::where($array)->get();
        return $data;
    }

    public function getKategori($id_sesiPembelajaran) {
        $data = DetailKategori::where('id_jadwal',$id_sesiPembelajaran)->get();
        $dataKategori = [];
        foreach ($data as $data) {
            $kategori = kategori::find($data->id_kategori);
            array_push($dataKategori,$kategori->nama_kategori);
        }
        return $dataKategori;
    }

    public function getAllKategori() {
        $kategori = kategori::get();
        return $kategori;
    }

    Public function getMedia($id_sesiPembelajaran) {
        $detailMedia = DetailMediaBelajar::where('id_sesiPembelajaran',$id_sesiPembelajaran)->get();
        $dataMedia = [];
        foreach ($detailMedia as $media) {
            $muehehe = [$media->id_sesiPembelajaran,$media->nama_media,$media->link_media];
            array_push($dataMedia,$muehehe);
            // dd($media->nama_media);
        }

        if (isset($detailMedia)) {
            return $dataMedia;
        }
    }

    public function editJadwal(Request $req) {
        $credentials = $req->validate([
            'harga'     => 'required',
            'kt'        => 'required',
            'mb'        => 'required',
            'link'      => 'required',
            'deskripsi' => 'required',
            'id_jadwal' => 'required'
        ]);
        SesiPembelajaran::where('id',$credentials['id_jadwal'])->update([
            'harga' => $credentials['harga'],
            'deskripsi' => $credentials['deskripsi']
        ]);

        DetailKategori::where('id_jadwal',$credentials['id_jadwal'])->delete();
        DetailMediaBelajar::where('id_sesiPembelajaran',$credentials['id_jadwal'])->delete();

        $this->setKategori($credentials['id_jadwal'],$credentials['kt']);
        $this->setMedia($credentials['id_jadwal'],$credentials['mb'],$credentials['link']);

        $back = new DashboardMController;
        return $back->jadwal();

    }

    public function editDate(Request $req) {
        $credentials = $req->validate([
            'tanggal' => 'required',
            'jam' => 'required',
            'id_tanggal' => 'required',
            'status_jadwal' => 'required'
        ]);
        $date = $credentials['tanggal'];
        $time = $credentials['jam'];

        $combineDT = date('Y-m-d H:i:s', strtotime("$date $time"));
        Jadwal::where('id',$credentials['id_tanggal'])->update([
            'datetime'=> $combineDT,
            'status_jadwal' => $credentials['status_jadwal']
        ]);
        $back = new DashboardMController;
        return $back->jadwal();
    }

    public function deleteDate(Request $req) {
        $credentials = $req->validate([
            'id_jadwal' => 'required'
        ]);

        Jadwal::where('id',$credentials['id_jadwal'])->delete();
        
        $back = new DashboardMController;
        return $back->jadwal();

    }
}
