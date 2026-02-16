<?php

namespace App\Services\Exercise;

use App\DTOs\Exercise\DTOsExercise;
use App\Interfaces\Exercise\IExerciseServices;
use App\Interfaces\Exercise\IExerciseRepository;
use Exception;

class ExerciseServices implements IExerciseServices 
{
    protected IExerciseRepository $ExerciseRepository;
    
    public function __construct(IExerciseRepository $ExerciseRepositoryInterface)
    {
        $this->ExerciseRepository = $ExerciseRepositoryInterface;
    }
    
    public function getAllExercises()
    {
        try {
            $results = $this->ExerciseRepository->getAllExercises();
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
    
    public function getExerciseById($id)
    {
        try {
            $results = $this->ExerciseRepository->getExerciseById($id);
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
    
    public function createExercise(DTOsExercise $data)
    {
        try {
            $results = $this->ExerciseRepository->createExercise($data);
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
    
    public function updateExercise(DTOsExercise $data, $id)
    {
        try {
            $Exercise = $this->ExerciseRepository->getExerciseById($id);
            $results = $this->ExerciseRepository->updateExercise($data, $Exercise);
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
    
    public function deleteExercise($id)
    {
        try {
            $Exercise = $this->ExerciseRepository->getExerciseById($id);
            $results = $this->ExerciseRepository->deleteExercise($Exercise);
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
