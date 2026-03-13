<?php

namespace App\Services\Profile;

use App\DTOs\Profile\DTOsProfile;
use App\Interfaces\Profile\IProfileServices;
use App\Interfaces\Profile\IProfileRepository;
use Exception;

class ProfileServices implements IProfileServices 
{
    protected IProfileRepository $ProfileRepository;
    
    public function __construct(IProfileRepository $ProfileRepositoryInterface)
    {
        $this->ProfileRepository = $ProfileRepositoryInterface;
    }
    
    public function getAllProfiles()
    {
        try {
            $results = $this->ProfileRepository->getAllProfiles();
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
    
    public function getProfileById($id)
    {
        try {
            $results = $this->ProfileRepository->getProfileById($id);
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
    
    public function createProfile(DTOsProfile $data)
    {
        try {
            $results = $this->ProfileRepository->createProfile($data);
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
    
    public function updateProfile(DTOsProfile $data, $id)
    {
        try {
            $Profile = $this->ProfileRepository->getProfileById($id);
            $results = $this->ProfileRepository->updateProfile($data, $Profile);
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
    
    public function deleteProfile($id)
    {
        try {
            $Profile = $this->ProfileRepository->getProfileById($id);
            $results = $this->ProfileRepository->deleteProfile($Profile);
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
