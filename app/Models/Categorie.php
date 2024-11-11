<?php

namespace App\Models;

use App\Models\SousCategorie;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'logo',
        'banner',
        'slug',
        'is_best',
        'total_note'
    ];

    public function souscategorie(){
        return $this->hasMany(SousCategorie::class, 'categorie_id');
    }


    public function delete()
    {
       DB::transaction(function(){
            $this->souscategorie()->delete();
            parent::delete();
       });
    }
}
