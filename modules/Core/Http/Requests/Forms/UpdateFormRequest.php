<?php

namespace Zix\Core\Http\Requests\Forms;

use App\Http\Requests\Request;

class UpdateFormRequest extends Request
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
            'title' => 'required|min:3|max:255',
            'slug' => 'required|min:3|max:255',
            'submit_text' => 'required|min:3|max:255',
        ];
    }
}
