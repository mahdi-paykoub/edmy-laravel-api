<?php

namespace App\Http\Requests\Admin\session;
use App\RestfulApi\ApiFormRequest;

class SessionStoreRequest extends ApiFormRequest
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
            'title' => ['required'],
            'time' => ['required'],
            'video' => ['required'],
            'free' => ['required'],
            'course_id' => ['required'],
        ];
    }
}
