<?php

namespace App\Http\Controllers;

use App\Http\Requests\client\contact_us\ContactUsRequest;
use App\Models\ContactUs;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\ContactUsService;

class ContactUsController extends Controller
{
    private ContactUsService $contactUsService;

    public function __construct()
    {
        $this->contactUsService = new ContactUsService();
    }
   
    public function store(ContactUsRequest $request)
    {
        $valid_data = $request->validated();
        //logic
        $result = $this->contactUsService->registerContatcUs($valid_data);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['پیام شما با موفقیت ثبت شد.'])->build()->response();
    }
}
