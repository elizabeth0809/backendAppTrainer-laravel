<?php

namespace App\Interfaces\Profile;

use App\DTOs\Profile\DTOsProfile;

interface IProfileServices 
{
    public function getAllProfiles();
    public function getProfileById($id);
    public function createProfile(DTOsProfile $data);
    public function updateProfile(DTOsProfile $data, $id);
    public function deleteProfile($id);
}
