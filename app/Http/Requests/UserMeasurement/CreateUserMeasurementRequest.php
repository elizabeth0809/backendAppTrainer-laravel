<?php

namespace App\Http\Requests\UserMeasurement;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateUserMeasurementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check(); // Modify this according to your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'integer|exists:users,id',
            'weight' => 'required|numeric|min:0',
            'age' => 'required|integer|min:0',
            'height' => 'required|numeric|min:0',
            'gender' => 'required|in:male,female,other',
            'level' => 'required|in:beginner,intermediate,advanced',

        ];
    }
public function messages(): array
{
    return [
        'user_id.required' => 'El usuario es obligatorio.',
        'user_id.integer' => 'El user_id debe ser un número entero.',
        'user_id.exists' => 'El usuario no existe.',
        'weight.required' => 'El peso es obligatorio.',
        'weight.numeric' => 'El peso debe ser un número válido.',
        'weight.min' => 'El peso no puede ser negativo.',

        'age.required' => 'La edad es obligatoria.',
        'age.integer' => 'La edad debe ser un número entero.',
        'age.min' => 'La edad no puede ser negativa.',

        'height.required' => 'La altura es obligatoria.',
        'height.numeric' => 'La altura debe ser un número válido.',
        'height.min' => 'La altura no puede ser negativa.',

        'gender.required' => 'El género es obligatorio.',
        'gender.in' => 'El género debe ser masculino, femenino u otro.',

        'level.required' => 'El nivel es obligatorio.',
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
