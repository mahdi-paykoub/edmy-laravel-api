<?php

namespace App\Http\Requests\Admin\comment;
use App\RestfulApi\ApiFormRequest;

class CommentsStoreRequest extends ApiFormRequest
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
            'comment' => ['required'],
            'parent_id' => ['required'],
            'commentable_id' => ['required'],
            'commentable_type' => ['required'],
            'rate' => ['required'],
            'approved' => ['required'],
            'user_id' => ['required'],
        ];
    }
}
