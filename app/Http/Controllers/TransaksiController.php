<?php

namespace App\Http\Controllers;

use DateTime;
use Midtrans;
use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use App\Models\Jadwal;
use App\Models\Customer;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use App\Models\SesiPembelajaran;
use App\Models\DetailMediaBelajar;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Profiler\Profile;

class TransaksiController extends Controller
{
    
    public function index($hp) {
        $customer = Customer::where('id_user',Auth::user()->id)->get();
        foreach ($customer as $customer) {
        }
        if (isset($customer->nama)) {
            $get_id = Pengajar::where('nomer_hp', $hp)->get();
            foreach ($get_id as $data_pengajar) {
            }

            $sesiPembelajaran = new PembelajaranController2 ;
            $data_jadwal =  $sesiPembelajaran->getJadwal($data_pengajar['id']);

            if (isset($data_jadwal['id'])) {
                $pembelajaran = new PembelajaranController2 ;
                $data_kategori = $pembelajaran->getKategori($data_jadwal['id']);
            
                $data_tanggal = $pembelajaran->getDateAvail($data_jadwal['id']);

                $data_media = $pembelajaran->getMedia($data_jadwal['id']);

                foreach ($data_tanggal as $bypass) {
                }

                if(isset($bypass->id)) {
                    return view('transaksi.profil_pengajar(Customer)',[
                        'data_pengajar' => $data_pengajar,
                        'data_jadwal'   => $data_jadwal,
                        'data_kategori' => $data_kategori,
                        'data_tanggal'  => $data_tanggal,
                        'data_media'    => $data_media,
                        'counter'       => Auth::user()->user_role,
                    ]);
                } else {
                    return view('transaksi.profil_pengajar(Customer)',[
                        'data_pengajar' => $data_pengajar,
                        'data_jadwal'   => $data_jadwal,
                        'data_kategori' => $data_kategori,
                        'exception'     => 'true',
                        'counter'       => Auth::user()->user_role,
                    ]);
                }
            }else{
                return view('transaksi.profil_pengajar(Customer)',[
                    'no_sesi' => 'true'
                ]);
            }
        } else {
            $get_id = Pengajar::where('nomer_hp', $hp)->get();
            foreach ($get_id as $data_pengajar) {
            }

            $sesiPembelajaran = new PembelajaranController2 ;
            $data_jadwal =  $sesiPembelajaran->getJadwal($data_pengajar['id']);

            if (isset($data_jadwal['id'])) {
                $pembelajaran = new PembelajaranController2 ;
                $data_kategori = $pembelajaran->getKategori($data_jadwal['id']);
            
                $data_tanggal = $pembelajaran->getDateAvail($data_jadwal['id']);

                $data_media = $pembelajaran->getMedia($data_jadwal['id']);

                foreach ($data_tanggal as $bypass) {
                }

                if(isset($bypass->id)) {
                    return view('transaksi.profil_pengajar(Customer)',[
                        'data_pengajar' => $data_pengajar,
                        'data_jadwal'   => $data_jadwal,
                        'data_kategori' => $data_kategori,
                        'data_tanggal'  => $data_tanggal,
                        'data_media'    => $data_media,
                        'counter'       => Auth::user()->user_role,
                    ]);
                } else {
                    return view('transaksi.profil_pengajar(Customer)',[
                        'data_pengajar' => $data_pengajar,
                        'data_jadwal'   => $data_jadwal,
                        'data_kategori' => $data_kategori,
                        'exception'     => 'true',
                        'counter'       => Auth::user()->user_role,
                    ]);
                }
            }else{
                return view('transaksi.profil_pengajar(Customer)',[
                    'no_sesi' => 'true'
                ]);
            }
        }
    }

    public function generateToken(Request $req) {
        $credentials = $req->validate([
            'tanggal_dipilih' => 'required',
            'media_dipilih'   => 'required',
            'id_jadwal'       => 'required'
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'SB-Mid-server-ooTHbDasA6GMO8akaHSfxPR3';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $jadwal = new PembelajaranController2;
        $data_jadwal = $jadwal->getJadwalbyId($credentials['id_jadwal']);
        $data_kategori = $jadwal->getKategori($data_jadwal['id']);
        $data_pengajar = Pengajar::find($data_jadwal['id_pengajar']);
        $data_tanggal  = Jadwal::find($credentials['tanggal_dipilih']);
        $data_media    = DetailMediaBelajar::where('nama_media',$credentials['media_dipilih'])->get();
        foreach ($data_media as $data_media) {
            # code...
        }
        $data_customer = Customer::where('id_user',Auth::user()->id)->get();
        foreach ($data_customer as $data_customer) {
            # code...
        }

        $data_user = Auth::user()->email;

        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => intval($data_jadwal['harga']),
            ),
            'item_details' => array(
                ["id" => $data_tanggal['id'],
                "price"=> intval($data_jadwal['harga']),
                "quantity"=> 1,
                "name"=> $data_pengajar['nama']]
            ),
            'customer_details' => array(
                'first_name' => $data_customer['nama'],
                'last_name' => '',
                'email' => $data_user,
                'phone' => '0'+$data_customer['nomer_hp'],
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('transaksi.detail_transaksi',[
            'snaptoken'         => $snapToken,
            'data_jadwal'       => $data_jadwal,
            'data_kategori'     => $data_kategori,
            'data_pengajar'     => $data_pengajar,
            'data_tanggal'      => $data_tanggal,
            'data_media'        => $data_media,
            'data_customer'     => $data_customer
        ]);
    }

    public function payment_post(Request $req) {
        $credentials = $req->validate([
            'json'  => 'required',
            'id_sesiBelajar' => 'required',
            'id_profil_pengajar' => 'required',
            'id_profil_customer' => 'required'
        ]);
        $customer = new Transaksi;
        $customer->id_sesiBelajar = $credentials['id_sesiBelajar'];
        $customer->id_profil_pengajar = $credentials['id_profil_pengajar'];
        $customer->id_profil_customer = $credentials['id_profil_customer'];
        $customer->save();

        Jadwal::where('id',$credentials["id_sesiBelajar"])->update([
            'status_jadwal' => 'dipesan'
        ]);
        $home = new HalamanUtamaController;
        return $home->index();
    }

    
}
