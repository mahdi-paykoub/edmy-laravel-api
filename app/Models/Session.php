<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'time', 'video', 'free', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
