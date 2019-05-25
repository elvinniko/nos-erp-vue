<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    protected $table = 'satuans';

    protected $fillable = [
        'KodeSatuan', 'NamaSatuan'
    ];

    protected $primaryKey = 'KodeSatuan'; // or null

    public $incrementing = false;
}
