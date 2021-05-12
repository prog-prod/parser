<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Lang;

class LogoutController extends Controller
{
    /**
     * User logout - removing current api token
     *
     * @return JsonResponse
     */
    public function __invoke(): JsonResponse
    {
        auth()->user()->token()->revoke();

        return response()->json([
            'result' => true,
            'message' => Lang::get('auth.logout'),
        ], 200);
    }
}
