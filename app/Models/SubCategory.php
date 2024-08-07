<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sub_categories';

    protected $fillable = [
        'id',
        'subcategory_code',
        'subcategory_name',
        'category_id'
    ];

    protected function casts(): array
    {
        return [
            'subcategory_code' => 'string',
            'category_id' => 'string'
        ];
    }
}
