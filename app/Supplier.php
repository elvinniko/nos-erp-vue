<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';

    protected $fillable = [
        'KodeSupplier','NamaSupplier','Alamat','Telepon','Handphone'
    ];

    protected $primaryKey = 'KodeSupplier'; // or null

    public $incrementing = false;
}