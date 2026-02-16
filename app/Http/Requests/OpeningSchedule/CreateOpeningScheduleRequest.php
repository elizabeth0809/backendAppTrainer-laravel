<?php

namespace App\Http\Requests\OpeningSchedule;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class CreateOpeningScheduleRequest extends FormRequest
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
            'day' => 'required|in:mon,tue,wed,thu,fri,sat,sun',
           'start_time' => [
            'required',
            'date_format:H:i',
            'before:endtime',
        ],

        'endtime' => [
            'required',
            'date_format:H:i',
            'after:start_time',
        ],
        ];
    }
    public function messages(): array
    {
        return [
            //name
            'name.required' => 'El nombre del horario es obligatorio',
            'name.string' => 'El nombre debe ser un texto válido.',
            'name.max' => 'El nombre no debe superar los 255 caracteres.',
            //day
            'day.required' => 'El número es obligatorio',
            'day.integer' => 'Las repeticiones deben ser un número entero.',
            //time
             'start_time.required' => 'La hora de inicio es obligatoria.',
            'start_time.date_format' => 'La hora de inicio debe tener el formato HH:MM.',
            'start_time.before' => 'La hora de inicio debe ser menor que la hora de fin.',

            'endtime.required' => 'La hora de fin es obligatoria.',
            'endtime.date_format' => 'La hora de fin debe tener el formato HH:MM.',
            'endtime.after' => 'La hora de fin debe ser mayor que la hora de inicio.',
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
