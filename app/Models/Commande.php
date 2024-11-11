<?php

namespace App\Models;

use App\Models\User;
use App\Models\ProduitCommander;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;


class Commande extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'user_id',
        'date',
        'details',
        'destination',
        'status',
        'code',
        'prix_total',
        'created_at',
        'updated_at',
    ];



    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function produit_commander(){
        return $this->hasMany(ProduitCommander::class);
    }
}
