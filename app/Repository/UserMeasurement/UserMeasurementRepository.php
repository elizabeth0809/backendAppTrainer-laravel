<?php

namespace App\Repository\UserMeasurement;

use App\DTOs\UserMeasurement\DTOsUserMeasurement;
use App\Interfaces\UserMeasurement\IUserMeasurementRepository;
use App\Models\UserMeasurement;

class UserMeasurementRepository implements IUserMeasurementRepository
{
    public function getAllUserMeasurements()
    {
        $UserMeasurements = UserMeasurement::all();
        return $UserMeasurements;
    }

    public function getUserMeasurementById($userId): UserMeasurement
    {
         $UserMeasurement = UserMeasurement::where('user_id', $userId)->first();

    if (!$UserMeasurement) {
        throw new \Exception("No results found for UserMeasurement for user {$userId}");
    }

    return $UserMeasurement;
    }

    public function createUserMeasurement(DTOsUserMeasurement $data): UserMeasurement
    {
        $result = UserMeasurement::create($data->toArray());
        return $result;
    }

    public function updateUserMeasurement(DTOsUserMeasurement $data, UserMeasurement $UserMeasurement): UserMeasurement
    {
        $UserMeasurement->update($data->toArray());
        return $UserMeasurement;
    }

    public function deleteUserMeasurement(UserMeasurement $UserMeasurement): UserMeasurement
    {
        $UserMeasurement->delete();
        return $UserMeasurement;
    }
}
