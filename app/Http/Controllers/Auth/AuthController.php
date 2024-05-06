<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Http\Requests\auth\UpdateUserRequest;
use App\Models\User;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function register(RegisterRequest $request)
    {
        $valid_data = $request->validated();

        $result = $this->userService->registerUser($valid_data);
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();


        return ApiResponseBuilder::withData($result['data'])
            ->withMessage(['ثبت نام با موفقیت انجام شد.'])
            ->withAppends(['token' => $result['data']->createToken($result['data']->name)->plainTextToken])
            ->build()->response();
    }


    public function login(LoginRequest $request)
    {
        $request->validated();


        $result = $this->userService->loginUser($request);
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();


        return ApiResponseBuilder::withData($result['data'])
            ->withMessage(['لاگین با موفقیت انجام شد.'])
            ->withAppends(['token' => $result['data']->createToken($result['data']->name)->plainTextToken])
            ->build()->response();
    }

    public function logout()
    {
        $result = $this->userService->logoutUser();
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['شما با موفقیت خارج شدید.'])
            ->build()->response();
    }

    public function getMe()
    {
        return ApiResponseBuilder::withData(auth()->user())
            ->build()->response();
    }


    public function update(UpdateUserRequest $request)
    {

        $valid_data = $request->validated();
        $result = $this->userService->updateUserInfo($valid_data);
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['اطلاعات کاربری شما آپدیت شد.'])
            ->build()->response();
    }

    public function changePassword()
    {
        
    }
}
