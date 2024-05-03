<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Session;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\SessionService;

class SessionController extends Controller
{
    private SessionService $sessionService;

    public function __construct()
    {
        $this->sessionService = new SessionService();
    }

    public function getOneSessionOfCourse(Session $session)
    {
        return ApiResponseBuilder::withData($session)->build()->response();
    }

    public function getSessionsOfOneCourse(Course $course)
    {
        $result = $this->sessionService->getAllSessions($course);
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }
}
