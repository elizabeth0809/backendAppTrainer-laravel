<?php

namespace App\Http\Controllers\Api\UserMeasurement;

use App\DTOs\UserMeasurement\DTOsUserMeasurement;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserMeasurement\CreateUserMeasurementRequest;
use App\Http\Requests\UserMeasurement\UpdateUserMeasurementRequest;
use App\Interfaces\UserMeasurement\IUserMeasurementServices;
use Illuminate\Http\Request;

class UserMeasurementController extends Controller 
{
    protected IUserMeasurementServices $UserMeasurementServices;
    
    public function __construct(IUserMeasurementServices $UserMeasurementServicesInterface)
    {
        $this->UserMeasurementServices = $UserMeasurementServicesInterface;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->UserMeasurementServices->getAllUserMeasurements();
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
    public function store(CreateUserMeasurementRequest $request)
    {
        $result = $this->UserMeasurementServices->createUserMeasurement(DTOsUserMeasurement::fromRequest($request));
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
        $result = $this->UserMeasurementServices->getUserMeasurementById($id);
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
    public function update(UpdateUserMeasurementRequest $request, string $id)
    {
        $result = $this->UserMeasurementServices->updateUserMeasurement(DTOsUserMeasurement::fromUpdateRequest($request), $id);
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
        $result = $this->UserMeasurementServices->deleteUserMeasurement($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
