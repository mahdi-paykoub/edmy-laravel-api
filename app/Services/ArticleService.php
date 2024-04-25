<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Article;
use Illuminate\Contracts\Debug\ExceptionHandler;

class ArticleService
{
    public function registerArticle($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return Article::create($data);
        });
    }
}
