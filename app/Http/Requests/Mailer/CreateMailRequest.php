<?php

namespace App\Http\Requests\Mailer;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class CreateMailRequest extends FormRequest
{

    public function prepareForValidation()
    {
        $this->merge([
            'id' => Uuid::uuid4()->toString(),
            'ip' => $this->getClientIp(),
            'user_agent' => $this->header('User-Agent')
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required',
            'content' => 'required',
            'id' => 'required|uuid',
            'ip' => 'required|ip',
            'user_agent' => 'required'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
