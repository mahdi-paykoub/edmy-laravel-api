<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\Session;

class SessionService
{

    public function getAllSessions($course)
    {
        return app(ServiceWrapper::class)(function () use ($course) {
            return  $course->sessions()->get();
        });
    }
    public function registerSession($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            //upload video
            $file = $data['video'];
            $destinationPath = 'assets/video/session/';
            $file_name = rand(1, 9999) . '-' . $file->getClientOriginalName();
            $file->move(public_path($destinationPath), $file_name);
            $data['video'] = $destinationPath . $file_name;
            //add session
            $session = Session::create($data);


            return $session;
        });
    }

    public function deleteSession($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return $data->delete();
        });
    }
}
