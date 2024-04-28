<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use App\RestfulApi\Facades\ApiResponseBuilder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $valid_data = $request->validated();

        // $result = $this->articleService->getAllArticles();
        // if (!$result['ok'])
        //     return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();


        $user = User::create([
            'name' => $valid_data['name'],
            'email' => $valid_data['email'],
            'password' => Hash::make($valid_data['password'])
        ]);

        return ApiResponseBuilder::withData($user)
            ->withMessage(['ثبت نام با موفقیت انجام شد.'])
            ->withAppends(['token' => $user->createToken($user->name)->plainTextToken])
            ->build()->response();
    }


    public function login(LoginRequest $request)
    {
        $valid_data = $request->validated();
        if (!Auth::attempt($request->only('email', 'password'))) {
            return ApiResponseBuilder::withMessage(['کاربر مورد نطر یافت نشد.'])
                ->withStatus(401)
                ->build()->response();
        }
        $user = User::where('email', $request->email)->first();
        return ApiResponseBuilder::withData($user)
            ->withMessage(['لاگین با موفقیت انجام شد.'])
            ->withAppends(['token' => $user->createToken($user->name)->plainTextToken])
            ->build()->response();
    }

    public function logout()
    {
        Auth::user()->currentAccessToken()->delete();
        return ApiResponseBuilder::withMessage(['شما با موفقیت خارج شدید.'])
            ->build()->response();
    }

    public function getMe()
    {
        return ApiResponseBuilder::withData(auth()->user())
            ->build()->response();
    }
}
