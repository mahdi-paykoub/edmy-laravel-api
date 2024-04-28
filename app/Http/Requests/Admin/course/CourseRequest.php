<?php

namespace App\Http\Requests\Admin\course;

use App\RestfulApi\ApiFormRequest;

class CourseRequest extends ApiFormRequest
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
            'name' => ['required'],
            'description' => ['required'],
            'slug' => ['required'],
            'price' => ['required', 'numeric'],
            'support' => ['required'],
            'status' => ['required', 'in:published,unpublished,presell'],
            'image' => ['required'],
            'category_id' => ['required'],
        ];
    }
}
