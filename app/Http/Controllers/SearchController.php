<?php

namespace App\Http\Controllers;

use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private SearchService $searchService;

    public function __construct()
    {
        $this->searchService = new SearchService();
    }

    public function articleName($value)
    {
        $result = $this->searchService->getSearchedArticlesByName($value);
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }
    public function courseName($value)
    {
        $result = $this->searchService->getSearchedCourseByName($value);
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }
}
