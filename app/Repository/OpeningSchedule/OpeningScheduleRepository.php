<?php

namespace App\Repository\OpeningSchedule;

use App\DTOs\OpeningSchedule\DTOsOpeningSchedule;
use App\Interfaces\OpeningSchedule\IOpeningScheduleRepository;
use App\Models\OpeningSchedule;

class OpeningScheduleRepository implements IOpeningScheduleRepository 
{
    public function getAllOpeningSchedules()
    {
        $OpeningSchedules = OpeningSchedule::all();
        return $OpeningSchedules;
    }
    
    public function getOpeningScheduleById($id): OpeningSchedule
    {
        $OpeningSchedule = OpeningSchedule::where('id', $id)->first();
        if (!$OpeningSchedule) {
            throw new \Exception("No results found for OpeningSchedule with ID {$id}");
        }
        return $OpeningSchedule;
    }
    
    public function createOpeningSchedule(DTOsOpeningSchedule $data): OpeningSchedule
    {
        $result = OpeningSchedule::create($data->toArray());
        return $result;
    }
    
    public function updateOpeningSchedule(DTOsOpeningSchedule $data, OpeningSchedule $OpeningSchedule): OpeningSchedule
    {
        $OpeningSchedule->update($data->toArray());
        return $OpeningSchedule;
    }
    
    public function deleteOpeningSchedule(OpeningSchedule $OpeningSchedule): OpeningSchedule
    {
        $OpeningSchedule->delete();
        return $OpeningSchedule;
    }
}
