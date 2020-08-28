<?php

namespace App\Http\Requests\Places;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlaceRequest extends FormRequest
{
    public function rules()
    {
        return [
            'company_name' => 'required|string',
            'role' => 'required|string',
            'description' => 'required|string',
            'joined_at' => 'required|date',
            'lefted_at' => 'nullable',
        ];
    }

    public function authorize()
    {
        return true;
    }
}
