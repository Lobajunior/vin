<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temoignage extends Model
{
    use HasFactory;

    protected $fillable = [
        'pseudo',
        'description',
        'profession',
        'etat',
        'photo',
        'slug',
    ];
}
