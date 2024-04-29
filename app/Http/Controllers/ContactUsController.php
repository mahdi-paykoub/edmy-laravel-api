<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\contact_us\ContactUsStoreRequest;
use App\RestfulApi\Facades\ApiResponseBuilder;
use App\Services\ContactUsService;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private ContactUsService $contactUsService;

    public function __construct()
    {
        $this->contactUsService = new ContactUsService();
    }
    public function store(ContactUsStoreRequest $request)
    {
        $valid_data = $request->validated();

        $result = $this->contactUsService->registerContact($valid_data);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage([' پیام شما با موفقیت ثبت شد.'])->build()->response();
    }
}
