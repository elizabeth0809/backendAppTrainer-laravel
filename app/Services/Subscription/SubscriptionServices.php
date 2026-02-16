<?php

namespace App\Services\Subscription;

use App\DTOs\Subscription\DTOsSubscription;
use App\Interfaces\Subscription\ISubscriptionServices;
use App\Interfaces\Subscription\ISubscriptionRepository;
use Exception;

class SubscriptionServices implements ISubscriptionServices 
{
    protected ISubscriptionRepository $SubscriptionRepository;
    
    public function __construct(ISubscriptionRepository $SubscriptionRepositoryInterface)
    {
        $this->SubscriptionRepository = $SubscriptionRepositoryInterface;
    }
    
    public function getAllSubscriptions()
    {
        try {
            $results = $this->SubscriptionRepository->getAllSubscriptions();
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
    
    public function getSubscriptionById($id)
    {
        try {
            $results = $this->SubscriptionRepository->getSubscriptionById($id);
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
    
    public function createSubscription(DTOsSubscription $data)
    {
        try {
            $results = $this->SubscriptionRepository->createSubscription($data);
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
    
    public function updateSubscription(DTOsSubscription $data, $id)
    {
        try {
            $Subscription = $this->SubscriptionRepository->getSubscriptionById($id);
            $results = $this->SubscriptionRepository->updateSubscription($data, $Subscription);
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
    
    public function deleteSubscription($id)
    {
        try {
            $Subscription = $this->SubscriptionRepository->getSubscriptionById($id);
            $results = $this->SubscriptionRepository->deleteSubscription($Subscription);
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
