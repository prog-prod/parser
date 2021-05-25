<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\UserVerification;
use App\Services\VerificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class TrackVerificationController extends Controller
{
    public function telegram(Request $request)
    {
        $verification = UserVerification::whereCode($request->code)->first();

        return response()->json([
            'result' => true,
            'approved' => (bool) $verification,
            'user' => new UserResource(user()),
            'message' => Lang::get('user.verification.track.telegram.success')
        ]);
    }
}
