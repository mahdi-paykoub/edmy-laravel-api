<?php

namespace App\Http\Controllers\Admin;

use ApiFormRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\article\ArticleStoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use App\RestfulApi\Facades\ApiResponseBuilder;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleStoreRequest $request)
    {
        $valid_data = $request->validated();
        //logic
        Article::create($valid_data);


        return ApiResponseBuilder::withMessage('عالی بود')->withData(['data' => 'slam'])->build()->response();


    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
