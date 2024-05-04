<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'comment',
        'parent_id',
        'commentable_id',
        'commentable_type',
        'rate',
        'approved',
        'user_id',
    ];
}