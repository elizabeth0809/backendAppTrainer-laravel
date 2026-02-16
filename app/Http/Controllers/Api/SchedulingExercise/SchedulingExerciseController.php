<?php

namespace App\Http\Controllers\Api\SchedulingExercise;

use App\DTOs\SchedulingExercise\DTOsSchedulingExercise;
use App\Http\Controllers\Controller;
use App\Http\Requests\SchedulingExercise\CreateSchedulingExerciseRequest;
use App\Http\Requests\SchedulingExercise\UpdateSchedulingExerciseRequest;
use App\Interfaces\SchedulingExercise\ISchedulingExerciseServices;
use Illuminate\Http\Request;

class SchedulingExerciseController extends Controller 
{
    protected ISchedulingExerciseServices $SchedulingExerciseServices;
    
    public function __construct(ISchedulingExerciseServices $SchedulingExerciseServicesInterface)
    {
        $this->SchedulingExerciseServices = $SchedulingExerciseServicesInterface;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->SchedulingExerciseServices->getAllSchedulingExercises();
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
    public function store(CreateSchedulingExerciseRequest $request)
    {
        $result = $this->SchedulingExerciseServices->createSchedulingExercise(DTOsSchedulingExercise::fromRequest($request));
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
        $result = $this->SchedulingExerciseServices->getSchedulingExerciseById($id);
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
    public function update(UpdateSchedulingExerciseRequest $request, string $id)
    {
        $result = $this->SchedulingExerciseServices->updateSchedulingExercise(DTOsSchedulingExercise::fromUpdateRequest($request), $id);
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
        $result = $this->SchedulingExerciseServices->deleteSchedulingExercise($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
