<?php

namespace App\Interfaces\UserMeasurement;

use App\DTOs\UserMeasurement\DTOsUserMeasurement;
use App\Models\UserMeasurement;

interface IUserMeasurementRepository 
{
    public function getAllUserMeasurements();
    public function getUserMeasurementById($id): UserMeasurement;
    public function createUserMeasurement(DTOsUserMeasurement $data): UserMeasurement;
    public function updateUserMeasurement(DTOsUserMeasurement $data, UserMeasurement $UserMeasurement): UserMeasurement;
    public function deleteUserMeasurement(UserMeasurement $UserMeasurement): UserMeasurement;
}
