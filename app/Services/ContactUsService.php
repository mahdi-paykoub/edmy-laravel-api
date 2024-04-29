<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\ContactUs;

class ContactUsService
{

    public function getAllContacts()
    {
        return app(ServiceWrapper::class)(function () {
            return ContactUs::all();
        });
    }
    public function registerContact($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return ContactUs::create($data);
        });
    }

    public function deleteContact($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return $data->delete();
        });
    }
}
