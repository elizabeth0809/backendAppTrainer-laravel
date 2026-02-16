<?php

namespace App\Interfaces\UserMeasurement;

use App\DTOs\UserMeasurement\DTOsUserMeasurement;

interface IUserMeasurementServices 
{
    public function getAllUserMeasurements();
    public function getUserMeasurementById($id);
    public function createUserMeasurement(DTOsUserMeasurement $data);
    public function updateUserMeasurement(DTOsUserMeasurement $data, $id);
    public function deleteUserMeasurement($id);
}
