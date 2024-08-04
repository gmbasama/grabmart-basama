<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grab extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dbo.items';

    protected $fillable = [
        'id',
        'name',
        'available_status',
        'description',
        'price',
        'photos',
        'special_type',
        'taxable',
        'barcode',
        'max_stock',
        'max_count',
        'sold_by_weight',
        'selling_time_id',
        'subcategory_id'
    ];

    protected function casts(): array
    {
        return [
            'id' => 'string',
        ];
    }
}
