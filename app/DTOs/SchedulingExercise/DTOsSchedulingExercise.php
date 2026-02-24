<?php

namespace App\DTOs\SchedulingExercise;

use App\Http\Requests\SchedulingExercise\CreateSchedulingExerciseRequest;
use App\Http\Requests\SchedulingExercise\UpdateSchedulingExerciseRequest;
use Illuminate\Support\Facades\Auth;

class DTOsSchedulingExercise
{
    public function __construct(
        private readonly ?string $name = null,
        private readonly ?string $start_time = null,
        private readonly ?string $end_time = null,
        private readonly ?int $user_id,
        private readonly ?int $exercise_id = null,
        private readonly ?int $user_measurement_id = null,
         private readonly ?int $opening_schedule_id = null,
    ) {}

    public static function fromRequest(CreateSchedulingExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
            start_time: $validated['start_time'],
            end_time: $validated['end_time'],
            user_id: Auth::id(),
            exercise_id: $validated['exercise_id'],
            user_measurement_id: $validated['user_measurement_id'],
            opening_schedule_id: $validated['opening_schedule_id'],
        );
    }

    public static function fromUpdateRequest(UpdateSchedulingExerciseRequest $request): self
    {
        $validated = $request->validated();

         return new self(
            name: $validated['name'] ?? null,
            start_time: $validated['start_time'],
            end_time: $validated['end_time'],
             user_id: Auth::id(),
            exercise_id: $validated['exercise_id'],
            user_measurement_id: $validated['user_measurement_id'],
            opening_schedule_id: $validated['opening_schedule_id'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'user_id' => $this->user_id,
            'exercise_id' => $this->exercise_id,
            'user_measurement_id' => $this->user_measurement_id,
            'opening_schedule_id' => $this-> opening_schedule_id,
        ];
    }
public function getUserId(): int
{
        return $this->user_id;
}
    public function getName(): ?string
    {
        return $this->name;
    }
    public function getStartTime(): ?string
    {
        return $this->start_time;
    }
    public function getEndtime(): ?string
    {
        return $this->end_time;
    }
    public function getExerciseId(): ?int
    {
        return $this->exercise_id;
    }
    public function userMeasurementId(): ?int
    {
        return $this->user_measurement_id;
    }
    public function getOpeningScheduleId(): ?int
    {
        return $this->opening_schedule_id;
    }
}
