<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

class ArticleService
{
    public function getAllArticles()
    {
        return app(ServiceWrapper::class)(function () {
            return Article::all();
        });
    }

    public function registerArticle($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            //upload image
            $file = $data['image'];
            $destinationPath = 'assets/images/article/';
            $file_name = rand(1, 9999) . '-' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $file_name);
            $data['image'] = $destinationPath . $file_name;
            //add article
            $article = Auth::user()->articles()->create($data);
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
    public function getArticlesByCategoryId($category)
    {
        return app(ServiceWrapper::class)(function () use ($category) {
            return $category->articles()->get();
        });
    }
}
