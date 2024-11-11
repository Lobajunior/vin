<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;


    protected $fillable = [ 
        'prix',
        'etat',
        'date_debut',
        'date_fin',
        'slug',
        'produit_id',
        'nb_promo',
        'nb_jours',
    ];


    public function produit(){
        return $this->belongsTo(Produit::class, 'produit_id');
    }
}
