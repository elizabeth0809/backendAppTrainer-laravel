<?php

namespace App\Services\OpeningSchedule;

use App\DTOs\OpeningSchedule\DTOsOpeningSchedule;
use App\Interfaces\OpeningSchedule\IOpeningScheduleServices;
use App\Interfaces\OpeningSchedule\IOpeningScheduleRepository;
use Exception;

class OpeningScheduleServices implements IOpeningScheduleServices 
{
    protected IOpeningScheduleRepository $OpeningScheduleRepository;
    
    public function __construct(IOpeningScheduleRepository $OpeningScheduleRepositoryInterface)
    {
        $this->OpeningScheduleRepository = $OpeningScheduleRepositoryInterface;
    }
    
    public function getAllOpeningSchedules()
    {
        try {
            $results = $this->OpeningScheduleRepository->getAllOpeningSchedules();
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function getOpeningScheduleById($id)
    {
        try {
            $results = $this->OpeningScheduleRepository->getOpeningScheduleById($id);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function createOpeningSchedule(DTOsOpeningSchedule $data)
    {
        try {
            $results = $this->OpeningScheduleRepository->createOpeningSchedule($data);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function updateOpeningSchedule(DTOsOpeningSchedule $data, $id)
    {
        try {
            $OpeningSchedule = $this->OpeningScheduleRepository->getOpeningScheduleById($id);
            $results = $this->OpeningScheduleRepository->updateOpeningSchedule($data, $OpeningSchedule);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
    
    public function deleteOpeningSchedule($id)
    {
        try {
            $OpeningSchedule = $this->OpeningScheduleRepository->getOpeningScheduleById($id);
            $results = $this->OpeningScheduleRepository->deleteOpeningSchedule($OpeningSchedule);
            return [
                'success' => true,
                'data' => $results
            ];
        } catch (Exception $exception) {
            return [
                'success' => false,
                'message' => $exception->getMessage()
            ];
        }
    }
}
