<?php

namespace App\DTOs\ExerciseObjetiveExercise;

use App\Http\Requests\ExerciseObjetiveExercise\CreateExerciseObjetiveExerciseRequest;
use App\Http\Requests\ExerciseObjetiveExercise\UpdateExerciseObjetiveExerciseRequest;
use Illuminate\Support\Facades\Auth;

class DTOsExerciseObjetiveExercise
{
    public int $exercise_id;
    public int $objetive_exercise_id;

    public function __construct(int $exercise_id, int $objetive_exercise_id)
    {
        $this->exercise_id = $exercise_id;
        $this->objetive_exercise_id = $objetive_exercise_id;
    }

    public static function fromRequest($request): self
    {
        return new self(
            $request->exercise_id,
            $request->objetive_exercise_id
        );
    }
    public function toArray(): array
    {
        return array_filter([
            'exercise_id' => $this->exercise_id,
            'objetive_exercise_id' => $this->objetive_exercise_id,
        ], fn($value) => !is_null($value));
    }
    public static function fromUpdateRequest(UpdateExerciseObjetiveExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            exercise_id: $validated['exercise_id'] ?? null,
            objetive_exercise_id: $validated['objetive_exercise_id'] ?? null,

        );
    }
}
