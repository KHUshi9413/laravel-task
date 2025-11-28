<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'deadline' => 'required|date|after_or_equal:today',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Project name is required.',
            'deadline.required' => 'Deadline is required.',
            'deadline.date' => 'Deadline must be a valid date.',
            'deadline.after_or_equal' => 'Deadline cannot be in the past.',
        ];
    }
}
