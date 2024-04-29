<?php


namespace App\Services;


use App\Base\ServiceWrapper;
use App\Models\ContactUs;

class ContactUsService
{
    public function registerContatcUs($data)
    {
        return app(ServiceWrapper::class)(function () use ($data) {
            return ContactUs::create($data);
        });
    }
}
