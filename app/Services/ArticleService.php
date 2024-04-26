<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Article;

class ArticleService
{
    public function registerArticle($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            //upload image
            $file = $data['image'];
            $destinationPath = 'assets/images/article';
            $file->move(public_path($destinationPath), rand(1, 9999) . '-' . $file->getClientOriginalName());
            $data['image'] = $destinationPath . $file->getClientOriginalName();
            //add article
            $article = Article::create($data);
            //set cat
            $article->categories()->attach($data['category_id']);

            return $article;
        });
    }
    public function deleteArticle($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return $data->delete();
        });
    }
}
