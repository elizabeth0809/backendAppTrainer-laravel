<?php

namespace App\DTOs\SchedulingExercise;

use App\Http\Requests\SchedulingExercise\CreateSchedulingExerciseRequest;
use App\Http\Requests\SchedulingExercise\UpdateSchedulingExerciseRequest;
use Illuminate\Support\Facades\Auth;

class DTOsSchedulingExercise
{
    public function __construct(
        private readonly ?string $name = null,
        private readonly ?int $user_id,
        private readonly ?string $scheduled_date = null,
        private readonly ?int $objetive_exercise_id = null,
        private readonly ?int $user_measurement_id = null,
         private readonly ?int $opening_schedule_id = null,
    ) {}

    public static function fromRequest(CreateSchedulingExerciseRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
            user_id: Auth::id(),
            scheduled_date: $validated['scheduled_date'],
            objetive_exercise_id: $validated['objetive_exercise_id'],
            user_measurement_id: $validated['user_measurement_id'],
            opening_schedule_id: $validated['opening_schedule_id'],
        );
    }

    public static function fromUpdateRequest(UpdateSchedulingExerciseRequest $request): self
    {
        $validated = $request->validated();

         return new self(
            name: $validated['name'] ?? null,
             user_id: Auth::id(),
            scheduled_date: $validated['scheduled_date'],
            objetive_exercise_id: $validated['objetive_exercise_id'],
            user_measurement_id: $validated['user_measurement_id'],
            opening_schedule_id: $validated['opening_schedule_id'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'user_id' => $this->user_id,
            'scheduled_date' => $this->scheduled_date,
            'objetive_exercise_id' => $this->objetive_exercise_id,
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
    public function getScheduledDate(): ?string
    {
        return $this->scheduled_date;
    }
    public function getObjetiveExerciseId(): ?int
    {
        return $this->objetive_exercise_id;
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
