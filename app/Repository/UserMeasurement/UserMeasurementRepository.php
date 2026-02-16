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
    
    public function getUserMeasurementById($id): UserMeasurement
    {
        $UserMeasurement = UserMeasurement::where('id', $id)->first();
        if (!$UserMeasurement) {
            throw new \Exception("No results found for UserMeasurement with ID {$id}");
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
