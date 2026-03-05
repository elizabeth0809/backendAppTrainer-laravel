<?php

namespace App\Services\ExerciseObjetiveExercise;

use App\DTOs\ExerciseObjetiveExercise\DTOsExerciseObjetiveExercise;
use App\Interfaces\ExerciseObjetiveExercise\IExerciseObjetiveExerciseRepository;
use App\Interfaces\ExerciseObjetiveExercise\IExerciseObjetiveExerciseService;
use Exception;


class ExerciseObjetiveExerciseServices implements IExerciseObjetiveExerciseService
{
    protected IExerciseObjetiveExerciseRepository $ExerciseObjetiveExerciseRepository;

    public function __construct(IExerciseObjetiveExerciseRepository $ExerciseObjetiveExerciseRepositoryInterface)
    {
        $this->ExerciseObjetiveExerciseRepository = $ExerciseObjetiveExerciseRepositoryInterface;
    }

    public function getAllExerciseObjetiveExercise()
    {
        try {
            $results = $this->ExerciseObjetiveExerciseRepository->getAllExerciseObjetiveExercise();
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

    public function getExerciseObjetiveExerciseById($id)
    {
        try {
            $results = $this->ExerciseObjetiveExerciseRepository->getExerciseObjetiveExerciseById($id);
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

    public function createExerciseObjetiveExercise(DTOsExerciseObjetiveExercise $data)
    {
        try {
            $results = $this->ExerciseObjetiveExerciseRepository->createExerciseObjetiveExercise($data);
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

    public function updateExerciseObjetiveExercise(DTOsExerciseObjetiveExercise $data, $id)
    {
        try {
            $Exercise = $this->ExerciseObjetiveExerciseRepository->getExerciseObjetiveExerciseById($id);
            $results = $this->ExerciseObjetiveExerciseRepository->updateExerciseObjetiveExercise($data, $Exercise);
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

    public function deleteExerciseObjetiveExercise($id)
    {
        try {
            $Exercise = $this->ExerciseObjetiveExerciseRepository->getExerciseObjetiveExerciseById($id);
            $results = $this->ExerciseObjetiveExerciseRepository->deleteExerciseObjetiveExercise($Exercise);
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
