<?php

namespace App\Models;

use App\Models\Note;
use App\Models\Promo;
use App\Casts\JsonCast;
use App\Models\Favoris;
use App\Models\SousCategorie;
use App\Models\ProduitCommander;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'images_secondaires' => JsonCast::class,
        'couleur' => JsonCast::class,
        'taille' => JsonCast::class,
    ];


    protected $fillable = [
        'id',
        'sousCategorie_id',
        'libelle',
        'photo',
        'images_secondaires',
        'taille',
        'couleur',
        'prix',
        'type',
        'etat',
        'qte_stock',
        'pointure',
        'is_djassa',
        'nb_view',
        'slug',
        'description',
        'created_at',
        'updated_at',
    ];

    //Mutators for modif my value of price
    protected function Prix() : Attribute
    {
        return new Attribute(
            get : fn (int $value) => number_format($value,0,',',' ') ,
            set : fn ($value) => str_replace(' ','', $value)
        );
    }


    public function produit_commander(){
        return $this->hasMany(ProduitCommander::class);
    }

    public function souscategorie(){
        return $this->belongsTo(SousCategorie::class, 'sousCategorie_id');
    }

    public function favorie(){
        return $this->hasMany(Favoris::class);
    }

    public function promotion(){
        return $this->hasMany(Promo::class);
    }

    public function note(){
        return $this->hasMany(Note::class);
    }

    public function delete()
    {
       DB::transaction(function(){
            $this->produit_commander()->delete();
            $this->favorie()->delete();
            $this->note()->delete();
            $this->promotion()->delete();
            parent::delete();
       });
    }
}
