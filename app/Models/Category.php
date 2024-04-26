<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'slug' , 'parent_id'];


    public function articles(): MorphToMany
    {
        return $this->morphedByMany(Article::class, 'categoriable');
    }
 
}
