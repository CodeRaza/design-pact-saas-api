<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
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
        'discription'
    ];
}
