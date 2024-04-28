<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'slug', 'price', 'support', 'status', 'image'];

    public function categories(): MorphToMany
    {
        return $this->morphToMany(Category::class, 'categoriable');
    }
}