<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class RegisterController extends Controller
{
    /**
     * @param RegisterRequest $request
     *
     * @return JsonResponse
     */
    public function __invoke(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        Auth::login($user);

        $accessToken = auth()->user()->createToken('front-side')->accessToken;

        return response()->json([
            'result' => true,
            'user' => new UserResource(auth()->user()),
            'access_token' => $accessToken,
            'message' => Lang::get('auth.register.success')
        ], 200);
    }
}
