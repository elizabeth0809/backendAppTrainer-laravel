<?php

namespace App\Repository\Subscription;

use App\DTOs\Subscription\DTOsSubscription;
use App\Interfaces\Subscription\ISubscriptionRepository;
use App\Models\Subscription;

class SubscriptionRepository implements ISubscriptionRepository 
{
    public function getAllSubscriptions()
    {
        $Subscriptions = Subscription::all();
        return $Subscriptions;
    }
    
    public function getSubscriptionById($id): Subscription
    {
        $Subscription = Subscription::where('id', $id)->first();
        if (!$Subscription) {
            throw new \Exception("No results found for Subscription with ID {$id}");
        }
        return $Subscription;
    }
    
    public function createSubscription(DTOsSubscription $data): Subscription
    {
        $result = Subscription::create($data->toArray());
        return $result;
    }
    
    public function updateSubscription(DTOsSubscription $data, Subscription $Subscription): Subscription
    {
        $Subscription->update($data->toArray());
        return $Subscription;
    }
    
    public function deleteSubscription(Subscription $Subscription): Subscription
    {
        $Subscription->delete();
        return $Subscription;
    }
}
