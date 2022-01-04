<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    
    public function getRegister()
    {

    }

    public function postRegister()
    {

    }

    public function getLogin()
    {
        return view('login');

    }

    public function postLogin(LoginRequest $request)
    {
        dd($request->all());

    }
}
