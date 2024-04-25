<?php


namespace App\Services;


use App\Models\Article;
use Illuminate\Contracts\Debug\ExceptionHandler;

class ArticleService
{
    public function registerArticle($data)
    {
        try {
            $article = Article::create($data);
        } catch (\Throwable $throwable) {
            app()[ExceptionHandler::class]->report($throwable);
            return [
                'ok' => false,
                'data' => 'خطایی در بکند رخ داده است',
            ];
        }

        return [
            'ok' => true,
            'data' => $article,
        ];

    }
}
