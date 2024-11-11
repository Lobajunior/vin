<?php

namespace App\Models;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategorieBlog extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'libelle'
    ];


    public function blog(){
        return $this->hasMany(Blog::class,'blog_cat_id');
    }
}
