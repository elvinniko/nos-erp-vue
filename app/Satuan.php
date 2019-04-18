<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuan';

    protected $fillable = [
        'KodeSatuan','NamaSatuan'
    ];

    protected $primaryKey = 'KodeSatuan'; // or null

    public $incrementing = false;
}