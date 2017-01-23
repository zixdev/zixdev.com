<?php

namespace Zix\Core\Http\Requests\Contact;

use App\Http\Requests\Request;

class ContactCreateRequest extends Request
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required|min:3|max:255',
            'phone'                 => 'required|min:3|max:255',
            'email'                 => 'required|email',
            'address'               => 'required|min:3|max:255',
            'message'               => 'required|min:30',
            'g-recaptcha-response'  => 'required|recaptcha'
        ];
    }
}
