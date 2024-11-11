<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitCommander extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'commande_id',
        'produit_id',
        'qte',
        'prix',
        'created_at',
        'updated_at',
    ];

    public function produit(){
        return $this->belongsTo(Produit::class, 'produit_id');
    }

    public function commande(){
        return $this->belongsTo(Commande::class, 'commande_id');
    }
}
