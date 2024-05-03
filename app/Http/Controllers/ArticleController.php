<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\ArticleService;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    private ArticleService $articleService;

    public function __construct()
    {
        $this->articleService = new ArticleService();
    }

    public function all()
    {
        $result = $this->articleService->getAllArticles();
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }
    public function single(Article $article)
    {
        return ApiResponseBuilder::withData($article)->build()->response();
    }
}
