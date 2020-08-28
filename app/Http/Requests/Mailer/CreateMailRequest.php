<?php

namespace App\Http\Requests\Mailer;

use Illuminate\Foundation\Http\FormRequest;

class CreateMailRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required',
            'content' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
