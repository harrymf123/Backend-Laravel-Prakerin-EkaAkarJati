<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    // Koneksi table
    
    protected $table = "testimoni";

    protected $fillable = ['nama','asal_tempat','image','deskripsi'];
}
