<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Article;
use App\Models\Course;

class SearchService
{
    public function getSearchedArticlesByName($value)
    {
        return app(ServiceWrapper::class)(function () use ($value) {
            return Article::where('title', 'like', "%{$value}%")->get();
        });
    }
    public function getSearchedCourseByName($value)
    {
        return app(ServiceWrapper::class)(function () use ($value) {
            return Course::where('name', 'like', "%{$value}%")->get();
        });
    }
}
