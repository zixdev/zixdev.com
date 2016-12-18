<?php

namespace Zix\Core\Http\Requests\User;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
        $rules = [
            'username'      => 'required|max:255|min:3|unique:users,id,'.$this->id,
        ];
        if (request()->user()->email != request()->get('email')) {
            $rules['email'] = 'required|email|max:255|min:3|unique:users';
        } else {
            $rules['email'] = 'required|email|max:255|min:3|unique:users,id,'.$this->id;
        }
        return $rules;
    }
}
