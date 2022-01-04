<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function getIndex(){
        return view('index');
    }
}
