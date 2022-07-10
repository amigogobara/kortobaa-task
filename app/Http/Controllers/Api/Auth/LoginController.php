<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Facades\App\Services\Authentication\Login;

class LoginController extends Controller
{
    /**
     * Create a new LoginController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login','adminLogin']]);
    }


    public function login()
    {
        return Login::login();
    }

    public function adminLogin()
    {
        return Login::adminLogin();
    }

    public function logout()
    {
        return Login::logout();
    }
}
