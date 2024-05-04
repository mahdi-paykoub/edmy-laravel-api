<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\comment\CommentsStoreRequest;
use App\Models\Comment;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->commentService->getAllComments();
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentsStoreRequest $request)
    {
        $valid_data = $request->validated();
        //logic
        $result = $this->commentService->registerComment($valid_data);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['دیدگاه با موفقیت ثبت شد'])->build()->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $result = $this->commentService->deleteComment($comment);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['دیدگاه مورد نظر حذف شد.'])->build()->response();
    }
}
