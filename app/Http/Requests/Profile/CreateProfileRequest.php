<?php

namespace App\Http\Requests\Profile;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateProfileRequest extends FormRequest
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
        'phone' => 'required|string|max:25',
        'birthdate' => 'required|date',
        ];
    }
public function messages(): array
{
    return [
        //id
        'user_id.required' => 'El usuario es obligatorio.',
        'user_id.integer' => 'El user_id debe ser un número entero.',
        'user_id.exists' => 'El usuario no existe.',
        // name
        'phone.required' => 'El telefono es obligatorio.',
        'phone.string' => 'El telefono debe ser un texto válido.',
        'phone.max' => 'El telefono no debe superar los 25 caracteres.',
        //birthdate
        'birthdate.required' => 'La fecha es obligatorio.',
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
