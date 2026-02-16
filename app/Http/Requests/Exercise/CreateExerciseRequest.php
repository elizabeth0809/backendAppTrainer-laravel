<?php

namespace App\Http\Requests\Exercise;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateExerciseRequest extends FormRequest
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
            'name' => 'required|string|max:250',
            'price' => 'required|int|min:0',
            'modalities' => 'required|in:person,hybrid,online',
            'img' => 'required|string|max:248',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del evento es obligatorio',
            'price.required' => 'El número es obligatorio',
            'modalities.required' => 'la modalidad es obligatoria',
            'img.required' => 'La imagen del evento es obligatoria',
            'img.image' => 'El archivo debe ser una imagen válida',
            'img.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif o webp',
            'img.max' => 'La imagen no debe superar los 2MB',
        ];
    }
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
