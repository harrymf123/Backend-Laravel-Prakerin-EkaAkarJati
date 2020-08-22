<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
    // Koneksi table
    
    protected $table = "image_gallery";

    protected $fillable = ['filename'];
}
