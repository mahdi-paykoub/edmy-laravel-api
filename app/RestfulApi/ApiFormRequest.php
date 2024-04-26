<?php

namespace App\RestfulApi;

use App\RestfulApi\Facades\ApiResponseBuilder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiFormRequest extends FormRequest
{
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw new HttpResponseException(
            ApiResponseBuilder::withMessage($validator->errors()->all())->withStatus(422)->build()->response()
        );
    }
}
