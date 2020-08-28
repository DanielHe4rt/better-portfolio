<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => 'email|required|exists:users',
            'password' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
