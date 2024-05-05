<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentService
{

    public function getAllComments()
    {
        return app(ServiceWrapper::class)(function () {
            return Comment::all();
        });
    }
    public function registerComment($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            //add comment
            $comment =  Auth::user()->comments()->create($data);
            return $comment;
        });
    }
    public function deleteComment($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return $data->delete();
        });
    }
}
