<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MitraKerja extends Model
{
    // Koneksi table
    
    protected $table = "mitra_kerja";

    protected $fillable = ['judul','image','deskripsi'];
}
