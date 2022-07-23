<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use App\Models\Pengajar;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index() {
        return $this->cekProfil(Auth::user()->id);
    }
    
    public function cekProfil($id) {
        $profil = User::where('id',$id)->get();
        foreach ($profil as $profil) {
            if ($profil->user_role === 'customer') {
                $data = $this->getcustomer($profil->id);
                return view("profil.profil",["data" => $data]);
            }elseif ($profil->user_role === 'pengajar') {
                $data = $this->getpengajar($profil->id);
                return view("profil.profil2",["data" => $data]);
            }
        }
    }

    public function profilebyPN($hp){
        $data = Pengajar::where('nomer_hp',$hp)->get();
        foreach ($data as $data) {
        }
        return view("profil.profil2",["data" => $data]);
    }

    public function getcustomer($id) {
        $data = Customer::where('id_user',$id)->get();
        foreach ($data as $key) {
            return $key;
        }
    }

    public function getpengajar($id) {
        $data = Pengajar::where('id_user',$id)->get();
        foreach ($data as $key) {
            return $key;
        }
    }

    public function viewSetupProfil() {
        return view('profil.pengajar',["id"=> Auth::user()->id]);
    }
    public function viewSetupPengajar() {
        return view('profil.pengajar2',["id"=> Auth::user()->id]);
    }

    public function create_pengajar(Request $req) {
        $credentials = $req->validate([
            'nama'          => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'nomer_hp'      => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'alamat'        => 'required',
            'biodata'       => 'required',
            'foto'          => 'image|file|max:1024',
            'video'         => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|file|max:30720',
            'scan_ktp'      => 'image|file|max:1024',
            'id_user'       => 'required',
            'status_akun'   => 'required'
        ]);

        
        $credentials['status_akun'] = 'unverified';
        $credentials['scan_ktp'] = $req->file('scan_ktp')->store('data_ktp');
        if($req->file('foto')) {
            $credentials['foto'] = $req->file('foto')->store('foto-profil');
        }
        if($req->file('video')) {
            $credentials['video'] = $req->file('video')->store('demo-video');
        }

        Pengajar::create($credentials);

        // $keeper = new Pengajar;
        // $keeper->id_user = $credentials['id_user'];
        // $keeper->nama = $credentials['nama'];
        // $keeper->tanggal_lahir = $credentials['tanggal_lahir'];
        // $keeper->nomer_hp = $credentials['nomer_hp'];
        // $keeper->alamat = $credentials['alamat'];
        // $keeper->biodata = $credentials['biodata'];
        // $keeper->foto = $credentials['foto'];
        // $keeper->video = $credentials['video'];
        // $keeper->scan_ktp = $credentials['scan_ktp'];
        // $keeper->status_akun = $credentials['status_akun'];
        // $keeper->save();
        return $this->index();


    }

    public function create_customer(Request $req) {
        $credentials = $req->validate([
            'nama'          => 'required|max:255',
            'tanggal_lahir' => 'required|max:255',
            'nomer_hp'      => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'alamat'        => 'required',
            'foto'          => 'image|file|max:1024',
            'id_user'       => 'required',
        ]);

        if($req->file('foto')) {
            $credentials['foto'] = $req->file('foto')->store('foto-profil');
        }

        Customer::create($credentials);
        return $this->index();
    }

    public function getProfilPengajar($id) {
        $data = Pengajar::where('id_user', $id)->get();
        foreach ($data as $data) {
        }
        return $data;
    }

    public function getProfil($id) {
        $data = Customer::where('id_user', $id)->get();
        foreach ($data as $data) {
        }
        return $data;
    }

    public function viewEditPengajar() {
        $data = $this->getProfilPengajar(Auth::user()->id);
        return view('profil.edit2',['data' => $data]);
    }

    public function viewEditProfil() {
        $data = $this->getProfil(Auth::user()->id);
        return view('profil.edit',['data' => $data]);
    }

    public function editPengajar(Request $req){
        $credentials = $req->validate([
            'nama'          => 'required',
            'tanggal_lahir' => 'required',
            'nomer_hp'      => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'alamat'        => 'required',
            'biodata'       => 'required',
            'id_user'       => 'required',
            'foto'          => 'image|file|max:1024',
            'video'         => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|file|max:30720',
        ]);

        if($req->file('foto')) {
            if($req->oldImage) {
                Storage::delete($req->oldImage);
            }
            $credentials['foto'] = $req->file('foto')->store('foto-profil');
            Pengajar::where('id_user',$credentials['id_user'])
            ->update([
            'nama' => $credentials['nama'],
            'tanggal_lahir' => $credentials['tanggal_lahir'],
            'nomer_hp' => $credentials['nomer_hp'],
            'alamat' => $credentials['alamat'],
            'biodata' => $credentials['biodata'],
            'foto' => $credentials['foto'],
            ]);
        }

        if($req->file('video')) {
            if($req->oldVideo) {
                Storage::delete($req->oldVideo);
            }
            $credentials['video'] = $req->file('video')->store('demo-video');
            Pengajar::where('id_user',$credentials['id_user'])
            ->update([
            'nama' => $credentials['nama'],
            'tanggal_lahir' => $credentials['tanggal_lahir'],
            'nomer_hp' => $credentials['nomer_hp'],
            'alamat' => $credentials['alamat'],
            'biodata' => $credentials['biodata'],
            'foto' => $credentials['foto'],
            'video' => $credentials['video'],
            ]);
        }

        Pengajar::where('id_user',$credentials['id_user'])
        ->update([
            'nama' => $credentials['nama'],
            'tanggal_lahir' => $credentials['tanggal_lahir'],
            'nomer_hp' => $credentials['nomer_hp'],
            'alamat' => $credentials['alamat'],
            'biodata' => $credentials['biodata'],
        ]);
        
        return $this->index();
    }

    public function editProfil(Request $req){
        $credentials = $req->validate([
            'nama'          => 'required',
            'tanggal_lahir' => 'required',
            'nomer_hp'      => 'required|regex:/(0)[0-9]/|not_regex:/[a-z]/|min:9',
            'alamat'        => 'required',
            'id_user'       => 'required',
            'foto'          => 'image|file|max:1024'
        ]);

        if($req->file('foto')) {
            if($req->oldImage) {
                Storage::delete($req->oldImage);
            }
            $credentials['foto'] = $req->file('foto')->store('foto-profil');
            Customer::where('id_user',$credentials['id_user'])
            ->update([
            'nama' => $credentials['nama'],
            'tanggal_lahir' => $credentials['tanggal_lahir'],
            'nomer_hp' => $credentials['nomer_hp'],
            'alamat' => $credentials['alamat'],
            'foto' => $credentials['foto'],
        ]);
        }

        Customer::where('id_user',$credentials['id_user'])
        ->update([
            'nama' => $credentials['nama'],
            'tanggal_lahir' => $credentials['tanggal_lahir'],
            'nomer_hp' => $credentials['nomer_hp'],
            'alamat' => $credentials['alamat'],
        ]);
        
        return $this->index();
    }


}
