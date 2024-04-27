<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use App\Models\User;
use App\RestfulApi\Facades\ApiResponseBuilder;
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
            ->withMessage(['کاربر با موفقیت اضافه شد.'])
            ->withAppends(['token' => $user->createToken($user->name)->plainTextToken])
            ->build()->response();
    }
    public function login(LoginRequest $request)
    {
        
    }

    public function logout()
    {
    }
}
