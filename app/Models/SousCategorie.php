<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SousCategorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'slug',
        'categorie_id',
        'photo',
    ];


    public function categorie(){
        return $this->belongsTo(Categorie::class,'categorie_id');
    }

    public function produit(){
        return $this->hasMany(Produit::class,'sousCategorie_id');
    }

    // public function delete()
    // {
    //    DB::transaction(function(){
    //         $this->produit()->delete();
    //         parent::delete();
    //    });
    // }
}
