<?php

namespace Zix\Blog\Http\Requests;

use App\Http\Requests\Request;

class CreateCategoryRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:3|max:255|unique:blog_categories',
            'slug'  => 'required|min:3|max:255|unique:blog_categories',
            'sites' => 'required',
        ];
    }
}
