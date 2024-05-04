<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\comment\CommentStoreRequest;
use App\Models\Article;
use App\Models\Course;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private CommentService $commentService;

    public function __construct()
    {
        $this->commentService = new CommentService();
    }

    public function add(CommentStoreRequest $request)
    {
        $valid_data = $request->validated();
        //logic
        $result = $this->commentService->registerComment($valid_data);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['دیدگاه با موفقیت ثبت شد'])->build()->response();
    }
    
    public function commentsOfArticle(Article $article)
    {
        return ApiResponseBuilder::withData($article->comments()->get())->build()->response();

    }
       
    public function commentsOfCourse(Course $course)
    {
        return ApiResponseBuilder::withData($course->comments()->get())->build()->response();

    }
}
