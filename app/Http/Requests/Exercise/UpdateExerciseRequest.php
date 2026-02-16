<?php

namespace App\Http\Requests\Exercise;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UpdateExerciseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Modify this according to your authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:250',
            'price' => 'sometimes|required|int|min:0',
            'modalities' => 'sometimes|required|in:person,hybrid,online',
            'img' => 'sometimes|required|string|max:248',
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
