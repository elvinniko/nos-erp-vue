<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggans';

    protected $fillable = [
        'KodePelanggan', 'NamaPelanggan', 'Kontak', 'Handphone', 'Email'
    ];

    protected $primaryKey = 'KodePelanggan'; // or null

    public $incrementing = false;
    // public $timestamps = false;
}
