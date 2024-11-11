<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'pte_description',
        'description',
        'image',
        'banner',
        'slug',
        'created_at',
        'updated_at',
    ];
}
