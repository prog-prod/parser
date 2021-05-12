<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class LoginController extends Controller
{
    /**
     * Login into system
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function __invoke(LoginRequest $request)
    {
        if (Auth::attempt($request->validated(), $request->remember ?? false))
        {
            $accessToken = auth()->user()->createToken('apiToken')->accessToken;

            return response()->json([
                'result' => true,
                'user' => new UserResource(auth()->user()),
                'access_token' => $accessToken,
                'message' => Lang::get('auth.success')
            ], 200);
        }

        return response()->json([
            'result' => false,
            'errors' => [Lang::get('auth.failed')]
        ], 401);
    }
}
