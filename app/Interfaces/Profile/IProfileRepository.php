<?php

namespace App\Interfaces\Profile;

use App\DTOs\Profile\DTOsProfile;
use App\Models\Profile;

interface IProfileRepository 
{
    public function getAllProfiles();
    public function getProfileById($id): Profile;
    public function createProfile(DTOsProfile $data): Profile;
    public function updateProfile(DTOsProfile $data, Profile $Profile): Profile;
    public function deleteProfile(Profile $Profile): Profile;
}
