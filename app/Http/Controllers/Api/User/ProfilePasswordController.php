<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilePasswordRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;

class ProfilePasswordController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param ProfilePasswordRequest $request
     * @return JsonResponse
     */
    public function __invoke(ProfilePasswordRequest $request): JsonResponse
    {
        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'result' => true,
            'message' => Lang::get('user.update.password_changed')
        ], 200);
    }
}
