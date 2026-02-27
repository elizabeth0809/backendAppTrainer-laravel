<?php

namespace App\Http\Requests\Exercise;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateExerciseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Modify this according to your authorization logic
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:250',
            'price' => 'required|int|min:0',
            'modalities' => 'required|in:person,hybrid,online',
            'img' => 'required|string|max:248',
            'objetive_exercise_id' => 'required|integer|exists:objetive_exercises,id',
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
            // objetive_exercise_id
            'objetive_exercise.required' => 'El ejercico es obligatorio.',
            'objetive_exercise.integer' => 'El ejercico seleccionado no es válido.',
            'objetive_exercise.exists'   => 'El ejercico seleccionado no existe.',
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
