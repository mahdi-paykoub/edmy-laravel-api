<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\category\CategoryStoreRequest;
use App\Models\Category;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private CategoryService $categoryService;

    public function __construct()
    {
        $this->categoryService = new CategoryService();
    }
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $valid_data = $request->validated();

        $result = $this->categoryService->registerCategory($valid_data);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['دسته بندی با موفقیت ثبت شد'])->build()->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $result = $this->categoryService->deleteCategory($category);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['دسته مورد نظر حذف شد.'])->build()->response();
    }
}
