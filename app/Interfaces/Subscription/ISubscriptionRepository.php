<?php

namespace App\Interfaces\Subscription;

use App\DTOs\Subscription\DTOsSubscription;
use App\Models\Subscription;

interface ISubscriptionRepository 
{
    public function getAllSubscriptions();
    public function getSubscriptionById($id): Subscription;
    public function createSubscription(DTOsSubscription $data): Subscription;
    public function updateSubscription(DTOsSubscription $data, Subscription $Subscription): Subscription;
    public function deleteSubscription(Subscription $Subscription): Subscription;
}
