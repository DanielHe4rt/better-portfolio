<?php

namespace App\Http\Requests\Skills;

use Illuminate\Foundation\Http\FormRequest;

class CreateSkillRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'string|required',
            'type_id' => 'required|exists:skill_type,id',
            'time_id' => 'required|exists:skill_time,id',
            'comment' => 'string'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
