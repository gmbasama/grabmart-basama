<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grab extends Model
{
    use HasFactory;

    protected $table = 'dbo.cetak';

    protected $fillable = [
        'ITEMCODE',
        'NAMAITEM',
        'HARGA',
        'DIVISI',
        'STATUS',
        'TANGGAL'
    ];
}
