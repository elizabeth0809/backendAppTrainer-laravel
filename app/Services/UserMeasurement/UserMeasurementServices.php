<?php

namespace App\Services\UserMeasurement;

use App\DTOs\UserMeasurement\DTOsUserMeasurement;
use App\Interfaces\UserMeasurement\IUserMeasurementServices;
use App\Interfaces\UserMeasurement\IUserMeasurementRepository;
use Exception;

class UserMeasurementServices implements IUserMeasurementServices
{
    protected IUserMeasurementRepository $UserMeasurementRepository;

    public function __construct(IUserMeasurementRepository $UserMeasurementRepositoryInterface)
    {
        $this->UserMeasurementRepository = $UserMeasurementRepositoryInterface;
    }

    public function getAllUserMeasurements()
    {
        try {
            $results = $this->UserMeasurementRepository->getAllUserMeasurements();
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

    public function getUserMeasurementById($id)
    {
        try {
            $results = $this->UserMeasurementRepository->getUserMeasurementById($id);
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

    public function createUserMeasurement(DTOsUserMeasurement $data)
    {
        try {
            $results = $this->UserMeasurementRepository->createUserMeasurement($data);
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

    public function updateUserMeasurement(DTOsUserMeasurement $dto)
    {
        try {
            $UserMeasurement = $this->UserMeasurementRepository
    ->getUserMeasurementById($dto->getUserId());
            $results = $this->UserMeasurementRepository->updateUserMeasurement($dto, $UserMeasurement);
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

    public function deleteUserMeasurement($id)
    {
        try {
            $UserMeasurement = $this->UserMeasurementRepository->getUserMeasurementById($id);
            $results = $this->UserMeasurementRepository->deleteUserMeasurement($UserMeasurement);
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
