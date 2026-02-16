<?php

namespace App\Interfaces\OpeningSchedule;

use App\DTOs\OpeningSchedule\DTOsOpeningSchedule;

interface IOpeningScheduleServices 
{
    public function getAllOpeningSchedules();
    public function getOpeningScheduleById($id);
    public function createOpeningSchedule(DTOsOpeningSchedule $data);
    public function updateOpeningSchedule(DTOsOpeningSchedule $data, $id);
    public function deleteOpeningSchedule($id);
}
