<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'kategori';

    protected $fillable = [
        'KodeKategori','NamaKategori','KodeItem'
    ];

    protected $primaryKey = 'KodeKategori'; // or null

    public $incrementing = false;
}