<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'size',
        'color',
        'author',
        'publish',
        'category',
        'meta_key',
        'meta_value'
    ];
}
