<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Category;

class CategoryService
{
    public function registerCategory($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return Category::create($data);
        });
    }
    public function deleteCategory($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return $data->delete();
        });
    }
}
