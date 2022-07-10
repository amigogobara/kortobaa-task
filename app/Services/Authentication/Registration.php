<?php

namespace App\Services\Authentication;

use App\Http\Requests\RegisterRequest;
use App\Models\User;

class Registration
{
    public function register(RegisterRequest $request)
    {
        $tenant = resolve('tenant');
        $user = $this->create($request,$tenant);

        return response()->json([
            'token' => auth()->tokenById($user->id),
            'user' => $user
        ]);
    }


    public function create($request,$tenant)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'tenant_id' => $tenant->id,
            'email_verified_at' => now()
        ]);
    }
}
