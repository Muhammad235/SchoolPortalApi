<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentScoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'mathematics' => 'sometimes|numeric|between:0,100',
            'english' => 'sometimes|numeric|between:0,100',
            'biology' => 'sometimes|numeric|between:0,100',
            'civic' => 'sometimes|numeric|between:0,100',
            'physics' => 'sometimes|numeric|between:0,100',
            'chemistry' => 'sometimes|numeric|between:0,100',
            'health_education' => 'sometimes|numeric|between:0,100',
        ];
    }
}
