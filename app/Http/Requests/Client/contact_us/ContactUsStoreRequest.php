<?php

namespace App\Http\Requests\Client\contact_us;
use App\RestfulApi\ApiFormRequest;

class ContactUsStoreRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' =>['required'],
            'email' =>['required'],
            'phone_number' =>['required'],
            'body' =>['required'],
        ];
    }
}
