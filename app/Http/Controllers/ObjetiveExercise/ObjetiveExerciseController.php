<?php

namespace App\Http\Controllers\ObjetiveExercise;

use App\DTOs\ObjetiveExercise\DTOsObjetiveExercise;
use App\Http\Controllers\Controller;
use App\Http\Requests\ObjetiveExercise\CreateObjetiveExerciseRequest;
use App\Http\Requests\ObjetiveExercise\UpdateObjetiveExerciseRequest;
use App\Interfaces\ObjetiveExercise\IObjetiveExerciseServices;
use Illuminate\Http\Request;

class ObjetiveExerciseController extends Controller 
{
    protected IObjetiveExerciseServices $ObjetiveExerciseServices;
    
    public function __construct(IObjetiveExerciseServices $ObjetiveExerciseServicesInterface)
    {
        $this->ObjetiveExerciseServices = $ObjetiveExerciseServicesInterface;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->ObjetiveExerciseServices->getAllObjetiveExercises();
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
    public function store(CreateObjetiveExerciseRequest $request)
    {
        $result = $this->ObjetiveExerciseServices->createObjetiveExercise(DTOsObjetiveExercise::fromRequest($request));
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
        $result = $this->ObjetiveExerciseServices->getObjetiveExerciseById($id);
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
    public function update(UpdateObjetiveExerciseRequest $request, string $id)
    {
        $result = $this->ObjetiveExerciseServices->updateObjetiveExercise(DTOsObjetiveExercise::fromUpdateRequest($request), $id);
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
        $result = $this->ObjetiveExerciseServices->deleteObjetiveExercise($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
