<?php

namespace App\Http\Requests\Skills;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSkillRequest extends FormRequest
{
    public function rules()
    {
        return [
            'id' => 'required|exists:skills|required',
            'name' => 'string',
            'type_id' => 'exists:skill_type,id',
            'time_id' => 'exists:skill_time,id',
            'comment' => 'string'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
