<?php

namespace App\Http\Controllers\Api\OpeningSchedule;

use App\DTOs\OpeningSchedule\DTOsOpeningSchedule;
use App\Http\Controllers\Controller;
use App\Http\Requests\OpeningSchedule\CreateOpeningScheduleRequest;
use App\Http\Requests\OpeningSchedule\UpdateOpeningScheduleRequest;
use App\Interfaces\OpeningSchedule\IOpeningScheduleServices;
use Illuminate\Http\Request;

class OpeningScheduleController extends Controller 
{
    protected IOpeningScheduleServices $OpeningScheduleServices;
    
    public function __construct(IOpeningScheduleServices $OpeningScheduleServicesInterface)
    {
        $this->OpeningScheduleServices = $OpeningScheduleServicesInterface;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->OpeningScheduleServices->getAllOpeningSchedules();
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
    public function store(CreateOpeningScheduleRequest $request)
    {
        $result = $this->OpeningScheduleServices->createOpeningSchedule(DTOsOpeningSchedule::fromRequest($request));
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
        $result = $this->OpeningScheduleServices->getOpeningScheduleById($id);
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
    public function update(UpdateOpeningScheduleRequest $request, string $id)
    {
        $result = $this->OpeningScheduleServices->updateOpeningSchedule(DTOsOpeningSchedule::fromUpdateRequest($request), $id);
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
        $result = $this->OpeningScheduleServices->deleteOpeningSchedule($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
