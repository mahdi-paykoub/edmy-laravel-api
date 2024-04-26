<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Category;

class CategoryService
{
    public function registerCategory($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            $category =  Category::create($data);
        });
    }
}
