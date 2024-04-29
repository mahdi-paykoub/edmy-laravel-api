<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->contactUsService->getAllContacts();
        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withData($result['data'])->build()->response();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        $result = $this->contactUsService->deleteContact($contactUs);

        if (!$result['ok'])
            return ApiResponseBuilder::withMessage($result['data'])->withStatus(500)->build()->response();

        return ApiResponseBuilder::withMessage(['پیام مورد نظر حذف شد.'])->build()->response();
    }
}
