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

        $startattendance = Attendance::where('user_id', $user->id)->latest()->first();

        $timestamp = Rest::create([
            'user_id' => $user->id,
            'attendance_id' => $startattendance->id,
            'start_time' => Carbon::now(),
            'end_time' => 0,
            'rest_time' => 0,
        ]);

        return redirect()->back()->with('status', '休憩開始打刻が完了しました。');
    }

    //休憩終了処理
    public function endRest()
    {
        $user = Auth::user();
        $attendance = Attendance::where('user_id', $user->id)->latest()->first();
        $timestamp = Rest::where('attendance_id', $attendance->id)->latest()->first();
        $end_rest = new carbon($timestamp->end_time);
        $start_rest = new carbon($timestamp->start_time);

        $timestamp->update([
            'end_time' => Carbon::now(),
            'rest_time' => $rest_time = (strtotime($end_rest) - strtotime($start_rest))
        ]);
        return redirect()->back()->with('status', '休憩終了時間打刻が完了しました。');
    }
}
