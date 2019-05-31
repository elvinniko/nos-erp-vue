<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $table = 'kategoris';

    protected $fillable = [
        'KodeKategori', 'NamaKategori', 'KodeItemAwal'
    ];

    protected $primaryKey = 'KodeKategori'; // or null

    public $incrementing = false;
}
