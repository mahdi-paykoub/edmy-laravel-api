<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Article;
use App\Models\User;
use App\RestfulApi\Facades\ApiResponseBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function registerUser($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
            ]);
        });
    }


    public function loginUser($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {

            if (!Auth::attempt($data->only('email', 'password'))) {
                return ApiResponseBuilder::withMessage(['کاربر مورد نطر یافت نشد.'])
                    ->withStatus(401)
                    ->build()->response();
            }

            return User::where('email', $data->email)->first();
        });
    }


    public function logoutUser()
    {
        return app(ServiceWrapper::class)(function () {
            Auth::user()->currentAccessToken()->delete();
        });
    }
}
