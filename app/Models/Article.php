<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'short_name', 'image', 'body' , 'user_id'];

   

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
