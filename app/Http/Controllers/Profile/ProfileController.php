<?php

namespace App\Http\Controllers\Profile;

use App\DTOs\Profile\DTOsProfile;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\CreateProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Interfaces\Profile\IProfileServices;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected IProfileServices $ProfileServices;

    public function __construct(IProfileServices $ProfileServicesInterface)
    {
        $this->ProfileServices = $ProfileServicesInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $result = $this->ProfileServices->getAllProfiles();
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
    public function store(CreateProfileRequest $request)
    {
        $result = $this->ProfileServices->createProfile(DTOsProfile::fromRequest($request));
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
        $result = $this->ProfileServices->getProfileById($id);
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
    public function update(UpdateProfileRequest $request)
{
    $result = $this->ProfileServices->updateProfile(
        DTOsProfile::fromUpdateRequest($request)
    );

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
        $result = $this->ProfileServices->deleteProfile($id);
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);
    }
}
