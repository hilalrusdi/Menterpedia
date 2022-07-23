<?php

namespace App\Models;

use App\Models\DetailKategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SesiPembelajaran extends Model
{
    use HasFactory;

    public function detailkategori() {
        return $this->hasMany(DetailKategori::class);
    }
}
