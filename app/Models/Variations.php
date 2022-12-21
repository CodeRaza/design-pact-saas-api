<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variations extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'product_type',
        'product_color',
        'product_size',
        'value',
        'stock_status'
    ];
}
