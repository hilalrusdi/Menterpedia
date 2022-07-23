<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama',
        'tanggal_lahir',
        'nomer_hp',
        'alamat',
        'biodata',
        'foto',
        'scan_ktp',
        'status_akun'
    ];
}
