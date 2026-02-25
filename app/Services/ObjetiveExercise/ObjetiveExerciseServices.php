<?php

namespace App\Services\ObjetiveExercise;

use App\DTOs\ObjetiveExercise\DTOsObjetiveExercise;
use App\Interfaces\ObjetiveExercise\IObjetiveExerciseServices;
use App\Interfaces\ObjetiveExercise\IObjetiveExerciseRepository;
use Exception;

class ObjetiveExerciseServices implements IObjetiveExerciseServices 
{
    protected IObjetiveExerciseRepository $ObjetiveExerciseRepository;
    
    public function __construct(IObjetiveExerciseRepository $ObjetiveExerciseRepositoryInterface)
    {
        $this->ObjetiveExerciseRepository = $ObjetiveExerciseRepositoryInterface;
    }
    
    public function getAllObjetiveExercises()
    {
        try {
            $results = $this->ObjetiveExerciseRepository->getAllObjetiveExercises();
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
    
    public function getObjetiveExerciseById($id)
    {
        try {
            $results = $this->ObjetiveExerciseRepository->getObjetiveExerciseById($id);
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
    
    public function createObjetiveExercise(DTOsObjetiveExercise $data)
    {
        try {
            $results = $this->ObjetiveExerciseRepository->createObjetiveExercise($data);
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
    
    public function updateObjetiveExercise(DTOsObjetiveExercise $data, $id)
    {
        try {
            $ObjetiveExercise = $this->ObjetiveExerciseRepository->getObjetiveExerciseById($id);
            $results = $this->ObjetiveExerciseRepository->updateObjetiveExercise($data, $ObjetiveExercise);
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
    
    public function deleteObjetiveExercise($id)
    {
        try {
            $ObjetiveExercise = $this->ObjetiveExerciseRepository->getObjetiveExerciseById($id);
            $results = $this->ObjetiveExerciseRepository->deleteObjetiveExercise($ObjetiveExercise);
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
