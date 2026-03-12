<?php

namespace App\Http\Requests\SchedulingExercise;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateSchedulingExerciseRequest extends FormRequest
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
        'name' => 'required|string|max:255',
        'user_id' => 'integer|exists:users,id',
        'scheduled_date' => 'required|date',
        'exercise_objetive_exercise_id' => 'required|int|exists:exercise_objetive_exercises,id',
        'user_measurement_id' => 'required|int|exists:user_measurements,id',
        'opening_schedule_id' => 'required|int|exists:opening_schedules,id',
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
        'name.required' => 'El nombre es obligatorio.',
        'name.string' => 'El nombre debe ser un texto válido.',
        'name.max' => 'El nombre no debe superar los 255 caracteres.',
        //scheduled_date
        'scheduled_date.required' => 'La fecha es obligatorio.',
        // exercise_id
        'exercise_objetive_exercise.required' => 'El objetivo es obligatorio.',
        'exercise_objetive_exercise.integer' => 'El objetivo seleccionado no es válido.',
        'exercise_objetive_exercise.exists'   => 'El objetivo seleccionado no existe.',

        // user_measurement_id
        'user_measurement_id.required' => 'Las mediciones del usuario son obligatorias.',
        'user_measurement_id.integer' => 'Las mediciones del usuario no son válidas.',
        'user_measurement_id.exists'   => 'las mediciones seleccionadas no existe.',

        // opening_schedule_id
        'opening_schedule_id.required' => 'El horario de apertura es obligatorio.',
        'opening_schedule_id.integer' => 'El horario de apertura no es válido.',
        'opening_schedule_id.exists'   => 'El horario seleccionado no existe.',
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
