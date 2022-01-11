<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Support\Facades\Log;


class AttendanceController extends Controller
{
    public function getIndex(){
        return view('index');
    }

    public function startAttendance()
    {
        $user = Auth::user();
        $startTimestamp = Attendance::where('user_id', $user->id)->latest()->first();
        if ($startTimestamp) {
            $startAttendance = new Carbon($startTimestamp->start_time);
            $startTimestampDay = $startAttendance->startOfDay();
        } else {
            $Attendance = Attendance::create([
                'user_id' => $user->id,
                'date' => Carbon::today(),
                'start_time' => Carbon::now(),
                'end_time' => 0,
                'attendance_time' => 0,
            ]);

            return redirect()->back()->with('status', '出勤打刻が完了しました');

        }

        $newTimestampDay = Carbon::today();


        if (($startTimestampDay == $newTimestampDay) && (empty($startTimestamp->end_time))){
            return redirect()->back()->with('error', 'すでに出勤打刻がされています');
        }

        $timestamp = Attendance::create([
            'user_id' => $user->id,
            'start_time' => Carbon::now(),
        ]);

        return redirect()->back()->with('status', '出勤打刻が完了しました');
    }

    public function endAttendance()
    {
        $user = Auth::user();
        $timestamp = Attendance::where('user_id', $user->id)->latest()->first();
        $rest_time = Rest::where('attendance_id', $timestamp->id)->latest()->first();
        $end_attendance = new carbon($timestamp->end_time);
        $start_attendance = new carbon($timestamp->start_time);

        $timestamp->update([
            'end_time' => Carbon::now(),
            'attendance_time' => $attendance_time = (strtotime($end_attendance) - strtotime($start_attendance) - strtotime($rest_time))
        ]);
        return redirect()->back()->with('status', '退勤打刻が完了しました');
    }

    public function getAttendance($num)
    {
        $items = Rest::all();
        $dates = Attendance::where('date',$num)->get()->paginate(4);

        // //休憩時間取得

        return view('attendance', [
            'items' => $items,
            'dates' => $dates,
        ]);
    }


}


