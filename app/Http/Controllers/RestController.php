<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;

class RestController extends Controller
{
    //休憩開始処理
    public function startRest()
    {
        $user = Auth::user();
        $startAttendance = Attendance::where('user_id', $user->id)->latest()->first();
        $timestamp = Rest::where('attendance_id', $startAttendance->id)->latest()->first();
        $timestamp->update([
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back()->with('status', '休憩開始打刻が完了しました');
    }

    //休憩終了処理
    public function endRest()
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->latest()->first();
        $timestamp = Rest::where('attendance_id', $attendance->id)->latest()->first();

        $timestamp->update([
            'end_time' => Carbon::now(),
        ]);
        return redirect()->back()->with('status', '休憩終了時間打刻が完了しました');
    }
}
