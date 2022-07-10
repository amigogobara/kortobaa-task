<?php

namespace App\Services\Authentication;

class Login
{


    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $tenant = resolve('tenant');
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt(array_merge( $credentials,[ 'tenant_id' => $tenant->id ] ))) {
            return response()->json(['message' => 'wrong email or password'], 401);
        }

        return $this->respondWithToken($token);
    }

    public function adminLogin()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt(array_merge( $credentials,[ 'is_admin' => 1 ] ))) {
            return response()->json(['message' => 'wrong email or password'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'token' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ],
            'user' => auth()->user()
        ]);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
