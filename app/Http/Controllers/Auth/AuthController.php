<?php

namespace App\Http\Controllers\Auth;

use App\DTOs\Auth\DTOsLogin;
use App\DTOs\Auth\DTOsRegister;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest as AuthLoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\LoginRequest;
use App\Interfaces\Auth\IAuthServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    protected IAuthServices $AuthServices;

    public function __construct(IAuthServices $AuthServicesInterface)
    {
        $this->AuthServices = $AuthServicesInterface;
    }
    public function me(Request $request)
    {
    try {
        $user = $request->user()->load([
            'profile',
            'userMeasurement'
        ]);

        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'message' => 'Error al obtener el perfil',
            'error' => $e->getMessage()
        ], 500);
    }
    }
    public function index(RegisterRequest $request)
    {
        //$filters = DTOsUserFilter::fromRequest($request);
       /* $user = Auth::user()->id;

        $result = $this->AuthServices->getAllUsers(
           // $filters,
            $user
        );*/

        /*    $result = $this->AuthServices->getAllServices();
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 200);*/
    }

    public function register(RegisterRequest $request)
    {
        $result = $this->AuthServices->register(DTOsRegister::fromRequest($request));
        if (!$result['success']) {
            return response()->json([
                'error' => $result['message']
            ], 422);
        }
        return response()->json($result['data'], 201);
    }

    public function login(AuthLoginRequest $request)
    {
        $result = $this->AuthServices->login(DTOsLogin::fromRequest($request));

        if (!$result['success']) {
            return response()->json([
                'message' => $result['message']
            ], 401);
        }
        return response()->json($result['data']);
    }
    public function logout(Request $request)
    {
        $result = $this->AuthServices->logout($request->user());

        if (!$result['success']) {
            return response()->json([
                'message' => $result['message']
            ], 500);
        }

        return response()->json([
            'message' => 'Successfully logged out'
        ], 200);
    }
    public function test()
    {
        return response()->json([
            'message' => "test"
        ], 200);
    }

    /*public function changePassword(ChangePasswordRequest $request)
    {
        $result = $this->AuthServices->changePassword(
            DTOsChangePassword::fromRequest($request)
        );

        if (!$result['success']) {
            return response()->json([
                'message' => $result['message']
            ], 422);
        }

        return response()->json([
            'message' => $result['message']
        ], 200);
    }*/
}
