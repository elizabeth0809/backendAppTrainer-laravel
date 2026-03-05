<?php

namespace App\Http\Controllers\ExerciseObjetiveExercise;

use App\DTOs\ExerciseObjetiveExercise\DTOsExerciseObjetiveExercise;
use App\Http\Controllers\Controller;
use App\Http\Requests\ExerciseObjetiveExercise\CreateExerciseObjetiveExerciseRequest;
use App\Http\Requests\ExerciseObjetiveExercise\UpdateExerciseObjetiveExerciseRequest;
use App\Http\Resources\ExerciseObjetiveExerciseResource;
use App\Interfaces\ExerciseObjetiveExercise\IExerciseObjetiveExerciseService;
use App\Services\ExerciseObjetiveExercise\ExerciseObjetiveExerciseServices;

class ExerciseObjetiveExerciseController extends Controller
{
    protected IExerciseObjetiveExerciseService $ExerciseObjetiveExerciseServices;

    public function __construct(IExerciseObjetiveExerciseService $ExerciseObjetiveExerciseServicesInterface)
    {
        $this->ExerciseObjetiveExerciseServices = $ExerciseObjetiveExerciseServicesInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->ExerciseObjetiveExerciseServices->getAllExerciseObjetiveExercise();
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return ExerciseObjetiveExerciseResource::collection($result['data']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateExerciseObjetiveExerciseRequest $request)
    {
        $result = $this->ExerciseObjetiveExerciseServices->createExerciseObjetiveExercise(DTOsExerciseObjetiveExercise::fromRequest($request));
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return (new ExerciseObjetiveExerciseResource($result['data']))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->ExerciseObjetiveExerciseServices->getExerciseObjetiveExerciseById($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
         return ExerciseObjetiveExerciseResource::collection($result['data']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseObjetiveExerciseRequest $request, string $id)
    {
        $result = $this->ExerciseObjetiveExerciseServices->updateExerciseObjetiveExercise(DTOsExerciseObjetiveExercise::fromUpdateRequest($request), $id);
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
        $result = $this->ExerciseObjetiveExerciseServices->deleteExerciseObjetiveExercise($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
