<?php

namespace App\Http\Requests\Admin\article;

use App\RestfulApi\ApiFormRequest;

class ArticleStoreRequest extends ApiFormRequest
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
            'description' => ['required'],
            'short_name' => ['required'],
            'image' => ['required'],
            'category_id' => ['required'],
            'body' => ['required'],
        ];
    }
}
