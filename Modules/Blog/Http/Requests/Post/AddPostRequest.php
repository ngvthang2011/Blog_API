<?php

namespace Modules\Blog\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255|min:5',
            'content' => 'required',
            'like' => 'numeric',
            'user_id' => 'required|numeric|exists:users,id',
            'category_id' => 'required|numeric|exists:categories,id',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
