<?php

namespace App\Interfaces\OpeningSchedule;

use App\DTOs\OpeningSchedule\DTOsOpeningSchedule;
use App\Models\OpeningSchedule;

interface IOpeningScheduleRepository 
{
    public function getAllOpeningSchedules();
    public function getOpeningScheduleById($id): OpeningSchedule;
    public function createOpeningSchedule(DTOsOpeningSchedule $data): OpeningSchedule;
    public function updateOpeningSchedule(DTOsOpeningSchedule $data, OpeningSchedule $OpeningSchedule): OpeningSchedule;
    public function deleteOpeningSchedule(OpeningSchedule $OpeningSchedule): OpeningSchedule;
}
