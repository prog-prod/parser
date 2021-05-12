<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;
use App\Http\Resources\UserResource;

class ProfileController extends Controller
{
    /**
     * Show User Data
     *
     * @return JsonResponse
     */
    public function show()
    {
        return response()->json([
            'result' => true,
            'user' => new UserResource(auth()->user())
        ], 200);
    }

    /**
     * Updating User Data
     *
     * @param ProfileUpdateRequest $request
     * @return JsonResponse
     */
    public function update(ProfileUpdateRequest $request): JsonResponse
    {
        $user = auth()->user();
        $user->fill($request->validated());
        $user->save();

        return response()->json([
            'result' => true,
            'user' => new UserResource($user),
            'message' => Lang::get('user.update.success')
        ], 200);
    }
}
