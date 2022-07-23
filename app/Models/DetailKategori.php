<?php

namespace App\Models;

use App\Models\kategori;
use App\Models\SesiPembelajaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailKategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kategori',
        'id_jadwal'
    ];

    public function sesipembelajaran() {
        return $this->belongsTo(SesiPembelajaran::class,'id_jadwal');
    }

    public function kategori() {
        return $this->belongsTo(kategori::class,'id_kategori');
    }
}
