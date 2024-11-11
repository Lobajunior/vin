<?php

namespace App\Models;

use App\Casts\JsonCast;
use App\Models\CategorieBlog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'image_secondaire' => JsonCast::class,
    ];

    protected $fillable = [
        'id',
        'titre',
        'description',
        'image_secondaire',
        'photo',
        'nb_view',
        'slug',
        'blog_cat_id',
    ];


    public function categorieblog() {
        return $this->belongsTo(CategorieBlog::class, 'blog_cat_id');
    }
}
