<?php

namespace App\Services\SchedulingExercise;

use App\DTOs\SchedulingExercise\DTOsSchedulingExercise;
use App\Interfaces\SchedulingExercise\ISchedulingExerciseServices;
use App\Interfaces\SchedulingExercise\ISchedulingExerciseRepository;
use Exception;

class SchedulingExerciseServices implements ISchedulingExerciseServices 
{
    protected ISchedulingExerciseRepository $SchedulingExerciseRepository;
    
    public function __construct(ISchedulingExerciseRepository $SchedulingExerciseRepositoryInterface)
    {
        $this->SchedulingExerciseRepository = $SchedulingExerciseRepositoryInterface;
    }
    
    public function getAllSchedulingExercises()
    {
        try {
            $results = $this->SchedulingExerciseRepository->getAllSchedulingExercises();
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
    
    public function getSchedulingExerciseById($id)
    {
        try {
            $results = $this->SchedulingExerciseRepository->getSchedulingExerciseById($id);
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
    
    public function createSchedulingExercise(DTOsSchedulingExercise $data)
    {
        try {
            $results = $this->SchedulingExerciseRepository->createSchedulingExercise($data);
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
    
    public function updateSchedulingExercise(DTOsSchedulingExercise $data, $id)
    {
        try {
            $SchedulingExercise = $this->SchedulingExerciseRepository->getSchedulingExerciseById($id);
            $results = $this->SchedulingExerciseRepository->updateSchedulingExercise($data, $SchedulingExercise);
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
    
    public function deleteSchedulingExercise($id)
    {
        try {
            $SchedulingExercise = $this->SchedulingExerciseRepository->getSchedulingExerciseById($id);
            $results = $this->SchedulingExerciseRepository->deleteSchedulingExercise($SchedulingExercise);
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
