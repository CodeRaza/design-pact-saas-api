<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attributes extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
        'group',
        'taxonomy_id',
        'taxonomy',
        'description',
        'parent',
        'count'
    ];
}
