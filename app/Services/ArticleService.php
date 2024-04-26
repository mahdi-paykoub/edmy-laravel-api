<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Article;

class ArticleService
{
    public function registerArticle($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            $file = $data['image'];
            $destinationPath = 'assets/images/article';
            $file->move(public_path($destinationPath), rand(1, 9999) . '-' . $file->getClientOriginalName());
            $data['image'] = $destinationPath . $file->getClientOriginalName();
            return Article::create($data);
        });
    }
    public function deleteArticle($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return $data->delete();
        });
    }
}
