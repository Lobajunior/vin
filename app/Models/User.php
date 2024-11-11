<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Note;
use App\Models\Favoris;
use App\Models\Commande;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'nom',
        'prenom',
        'phone',
        'email',
        'ville',
        'genre',
        'adresse',
        'photo',
        'slug',
        'password',
        'role',
        'profession',
        'is_member',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function commande(){
        return $this->hasMany(Commande::class);
    }

    public function favoris(){
        return $this->hasMany(Favoris::class);
    }

    public function note(){
        return $this->hasMany(Note::class);
    }

    
    public function delete()
    {
       DB::transaction(function(){
            $this->favoris()->delete();
            $this->note()->delete();
            parent::delete();
       });
    }

}
