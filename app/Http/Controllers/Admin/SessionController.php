<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\session\SessionStoreRequest;
use App\Models\Course;
use App\Models\Session;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\SessionService;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    private SessionService $sessionService;

    public function __construct()
    {
        $this->sessionService = new SessionService();
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

    public function getSessionsOfOneCourse(Course $course)
    {
        $result = $this->sessionService->getAllSessions($course);
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionStoreRequest $request)
    {
        $valid_data = $request->validated();
        //logic
        $result = $this->sessionService->registerSession($valid_data);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['جلسه با موفقیت ثبت شد'])
            ->withData($result['data'])
            ->build()->response();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Session $session
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
        $result = $this->sessionService->deleteSession($session);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['جلسه مورد نظر حذف شد.'])->build()->response();
    }
}
