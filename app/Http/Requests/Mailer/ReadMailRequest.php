<?php

namespace App\Http\Requests\Mailer;

use Illuminate\Foundation\Http\FormRequest;

class ReadMailRequest extends FormRequest
{
    protected function prepareForValidation()
    {
        $rawUrl = explode('/', $this->url());
        $mailId = $rawUrl[count($rawUrl) - 1];

        $this->merge(['id' => $mailId]);
    }

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required|exists:mails',
            'status_id' => 'required'
        ];
    }
}
