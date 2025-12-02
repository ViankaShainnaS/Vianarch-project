<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use illuminate\Support\Facades\DB;

class Shoes extends Model
{
    protected $table = "shoes";
    protected $fillable = [
        'nama_sepatu',
        'harga_sepatu',
        'jenis_sepatu',
        'ukuran_sepatu',
        'gambar_sepatu',
    ];
}
