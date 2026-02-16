<?php

namespace App\Interfaces\Subscription;

use App\DTOs\Subscription\DTOsSubscription;

interface ISubscriptionServices 
{
    public function getAllSubscriptions();
    public function getSubscriptionById($id);
    public function createSubscription(DTOsSubscription $data);
    public function updateSubscription(DTOsSubscription $data, $id);
    public function deleteSubscription($id);
}
