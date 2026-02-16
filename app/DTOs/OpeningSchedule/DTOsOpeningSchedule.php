<?php

namespace App\DTOs\OpeningSchedule;

use App\Http\Requests\OpeningSchedule\CreateOpeningScheduleRequest;
use App\Http\Requests\OpeningSchedule\UpdateOpeningScheduleRequest;
use Illuminate\Support\Facades\Auth;

class DTOsOpeningSchedule
{
    public function __construct(
        private readonly ?string $name = null,
        private readonly ?string $day = null,
        private readonly ?string $start_time = null,
        private readonly ?string $endtime = null,
    ) {}

    public static function fromRequest(CreateOpeningScheduleRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
            day: $validated['day'],
            start_time: $validated['start_time'],
            endtime: $validated['endtime'],
        );
    }

    public static function fromUpdateRequest(UpdateOpeningScheduleRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'] ?? null,
            day: $validated['day'] ?? null,
            start_time: $validated['start_time'],
            endtime: $validated['endtime'],
        );
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'day' => $this->day,
            'start_time' => $this->start_time,
            'endtime' => $this->endtime,
        ];
    }

      public function getName(): ?string
    {
        return $this->name;
    }
    public function getDay(): ?int
    {
        return $this->day;
    }
    public function getStartTime(): ?string
    {
        return $this->start_time;
    }
    public function getEndtime(): ?string
    {
        return $this->endtime;
    }
}
