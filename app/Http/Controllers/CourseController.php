<?php

namespace App\Http\Controllers;

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

    public function allCourses()
    {
        $result = $this->courseService->getAllCourses();
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }

    public function singleCourse(Course $course)
    {
        return ApiResponseBuilder::withData($course)->build()->response();
    }
}
