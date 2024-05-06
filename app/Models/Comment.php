<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function child()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }
}
