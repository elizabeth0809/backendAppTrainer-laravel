<?php

namespace App\Repository\Profile;

use App\DTOs\Profile\DTOsProfile;
use App\Interfaces\Profile\IProfileRepository;
use App\Models\Profile;

class ProfileRepository implements IProfileRepository
{
    public function getAllProfiles()
    {
        $Profiles = Profile::all();
        return $Profiles;
    }

    public function getProfileById($userId): Profile
    {
    $Profile = Profile::where('user_id', $userId)->first();

    if (!$Profile) {
        throw new \Exception("No results found for Profile for user {$userId}");
    }

    return $Profile;
    }

    public function createProfile(DTOsProfile $data): Profile
    {
        $result = Profile::create($data->toArray());
        return $result;
    }

    public function updateProfile(DTOsProfile $data, Profile $Profile): Profile
    {
        $Profile->update($data->toArray());
        return $Profile;
    }

    public function deleteProfile(Profile $Profile): Profile
    {
        $Profile->delete();
        return $Profile;
    }
}
