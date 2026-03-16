<?php

namespace App\Http\Requests\UserMeasurement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UpdateUserMeasurementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'weight' => 'sometimes|numeric|min:0',
            'height' => 'sometimes|numeric|min:0',
            'gender' => 'sometimes|in:male,female,other',
            'level' => 'sometimes|in:beginner,intermediate,advanced',
        ];
    }
    public function messages(): array
    {
    return [
        'weight.required' => 'El peso es obligatorio.',
        'weight.numeric' => 'El peso debe ser un número válido.',
        'weight.min' => 'El peso no puede ser negativo.',
        'height.numeric' => 'La altura debe ser un número válido.',
        'height.min' => 'La altura no puede ser negativa.',
        'gender.in' => 'El género debe ser masculino, femenino u otro.',
        'level.in' => 'El nivel debe ser principiante, intermedio o avanzado.',
    ];
}
    /**
     * Handle a failed validation attempt.
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(
            [
                'message' => 'Validation errors',
                'data' => $validator->errors()
            ],
            422
        ));
    }

    /**
     * Handle a failed authorization attempt.
     */
    protected function failedAuthorization()
    {
        throw new HttpResponseException(response()->json([
            'message' => 'You are not authorized to perform this action.',
        ], 403));
    }
}
