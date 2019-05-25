<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MataUang extends Model
{
    protected $table = 'matauangs';

    protected $fillable = [
        'KodeMataUang', 'NamaMataUang', 'Nilai'
    ];

    protected $primaryKey = 'KodeMataUang'; // or null

    public $incrementing = false;
}
