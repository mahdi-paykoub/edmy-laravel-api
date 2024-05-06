<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\User;
use App\RestfulApi\Facades\ApiResponseBuilder;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function getAllUsers()
    {
        return app(ServiceWrapper::class)(function () {
            return User::all();
        });
    }

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

    public function deleteUser($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return $data->delete();
        });
    }

    public function updateUserInfo($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            //upload user image
            if (isset($data['image'])) {
                $file = $data['image'];
                $destinationPath = 'assets/images/user/';
                $file_name = rand(1, 9999) . '-' . $file->getClientOriginalName();
                $file->move(public_path($destinationPath), $file_name);
                $data['image'] = $destinationPath . $file_name;
            }

            return User::where('id', Auth::user()->id)->update($data);
        });
    }

    public function updatePassword($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            #Match The Old Password
            if (!Hash::check($data['old_password'], Auth::user()->password)) {
                throw new Exception();
            }
            return User::whereId(Auth::user()->id)->update([
                'password' => Hash::make($data['new_password'])
            ]);
        });
    }
}
