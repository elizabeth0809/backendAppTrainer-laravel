<?php

namespace App\Http\Controllers\Api\Exercise;

use App\DTOs\Exercise\DTOsExercise;
use App\Http\Controllers\Controller;
use App\Http\Requests\Exercise\CreateExerciseRequest;
use App\Http\Requests\Exercise\UpdateExerciseRequest;
use App\Http\Resources\ExerciseResource;
use App\Interfaces\Exercise\IExerciseServices;
use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    protected IExerciseServices $ExerciseServices;

    public function __construct(IExerciseServices $ExerciseServicesInterface)
    {
        $this->ExerciseServices = $ExerciseServicesInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->ExerciseServices->getAllExercises();
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return ExerciseResource::collection($result['data']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateExerciseRequest $request)
    {
        $result = $this->ExerciseServices->createExercise(DTOsExercise::fromRequest($request));
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return (new ExerciseResource($result['data']))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $result = $this->ExerciseServices->getExerciseById($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
         return ExerciseResource::collection($result['data']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExerciseRequest $request, string $id)
    {
        $result = $this->ExerciseServices->updateExercise(DTOsExercise::fromUpdateRequest($request), $id);
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
        $result = $this->ExerciseServices->deleteExercise($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
