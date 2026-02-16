<?php

namespace App\Http\Requests\OpeningSchedule;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;

class UpdateOpeningScheduleRequest extends FormRequest
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
            'name' => 'sometimes|required|string|max:255',
            'day' => 'sometimes|required|in:mon,tue,wed,thu,fri,sat,sun',
           'start_time' => [
            'sometimes',
            'date_format:H:i',
            'before:endtime',
        ],

        'endtime' => [
            'sometimes',
            'date_format:H:i',
            'after:start_time',
        ],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'El nombre del horario es obligatorio',
            'day.required' => 'El número es obligatorio',
            'start_time.before' => 'La hora de inicio debe ser menor que la hora de fin.',
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
