<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Favoris extends Model
{
    use HasFactory;

    protected $fillable = [
        'produit_id',
        'user_id',
        'slug',
    ];

    public function produit(){
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
