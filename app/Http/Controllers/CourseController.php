<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\CourseService;

class CourseController extends Controller
{
    private CourseService $courseService;

    public function __construct()
    {
        $this->courseService = new CourseService();
    }

    public function all()
    {
        $result = $this->courseService->getAllCourses();
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }

    public function single(Course $course)
    {
        return ApiResponseBuilder::withData($course)->withAppends(['comments' => $course->comments()->where('approved',  true)->with('user')->get()])->build()->response();
    }
    public function categoryCourses(Category $category)
    {
        $result = $this->courseService->getCoursesByCatId($category);
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }
}
