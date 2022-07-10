<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Facades\App\Services\Authentication\Registration;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
       return Registration::register($request);
    }
}
