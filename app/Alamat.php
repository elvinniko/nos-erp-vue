<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    protected $table = 'alamatpelanggans';

    protected $fillable = [
        'KodePelanggan','Alamat','Kota', 'Provinsi', 'Negara', 'Faks', 'Telepon'
    ];

    protected $primaryKey = 'KodePelanggan'; // or null

    public $incrementing = false;
}