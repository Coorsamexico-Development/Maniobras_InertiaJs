<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    /**
     * Login function
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3']
        ]);
        if($validator->fails()){
            $errors = $validator->errors();
            $message = empty($errors->first('email'))?
                        $errors->first('password'):
                        $errors->first('email');
            return response()->json([
                'errors' => $errors,
                'message' => $message
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json([
                'errors' => ['email' => [__('auth.failed')]],
                'message' => __('auth.failed')
            ], 422);
        }

        $apiToken = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'auth_token' => $apiToken
        ]);

    }

    /**
     * Logout function
     */
    public function destroy(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response([
            'message' => 'ok'
        ]);
    }
    /**
     * Check Token
     */
    public function checkToken(Request $request)
    {
        $apiToken = $request->user()->currentAccessToken();
        return response([
            'user' => $request->user(),
            'auth_token' => $request->header('Authorization')
        ]);
    }
}
