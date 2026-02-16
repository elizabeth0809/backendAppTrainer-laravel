<?php

namespace App\Http\Controllers\Api\Subscription;

use App\DTOs\Subscription\DTOsSubscription;
use App\Http\Controllers\Controller;
use App\Http\Requests\Subscription\CreateSubscriptionRequest;
use App\Http\Requests\Subscription\UpdateSubscriptionRequest;
use App\Interfaces\Subscription\ISubscriptionServices;
use Illuminate\Http\Request;

class SubscriptionController extends Controller 
{
    protected ISubscriptionServices $SubscriptionServices;
    
    public function __construct(ISubscriptionServices $SubscriptionServicesInterface)
    {
        $this->SubscriptionServices = $SubscriptionServicesInterface;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->SubscriptionServices->getAllSubscriptions();
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateSubscriptionRequest $request)
    {
        $result = $this->SubscriptionServices->createSubscription(DTOsSubscription::fromRequest($request));
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 201);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->SubscriptionServices->getSubscriptionById($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionRequest $request, string $id)
    {
        $result = $this->SubscriptionServices->updateSubscription(DTOsSubscription::fromUpdateRequest($request), $id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->SubscriptionServices->deleteSubscription($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
