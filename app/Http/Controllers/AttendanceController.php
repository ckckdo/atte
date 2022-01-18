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
use DateTime;

class AttendanceController extends Controller
{
    // 打刻画面表示
    public function getIndex(){
        $user = Auth::user();
        $attendance_user = Attendance::where('user_id', $user->id)->latest()->first();

        // 会員登録後初ログインのとき(データがない時)、attendanceテーブルとrestテーブルに新データ挿入
        if(!isset($attendance_user)){
            $Attendance = Attendance::create([
                'user_id' => $user->id]);
            $Rest = Rest::create([
                'attendance_id' => $Attendance->id]);
            $rest_user = Rest::where('attendance_id', $Attendance->id)->latest()->first();
            $check_start = $Attendance->start_time;
            $check_end = $Attendance->end_time;
            $check_rest_start = optional($rest_user)->start_time;
            $check_rest_end = optional($rest_user)->end_time;
        }
        // ログインユーザーのテーブルがある時、その内容を取得
        else{
            $rest_user = Rest::where('attendance_id', $attendance_user->id)->latest()->first();
            $check_start = $attendance_user->start_time;
            $check_end = $attendance_user->end_time;
            $check_rest_start = optional($rest_user)->start_time;
            $check_rest_end = optional($rest_user)->end_time;
        }
        $items = [$check_start,$check_end,$check_rest_start,$check_rest_end];

        return view('index',compact('items'));
    }


    // 出勤打刻処理
    public function startAttendance()
    {
        $user = Auth::user();
        $Timestamp = Attendance::where('user_id', $user->id)->latest()->first();
            if(!isset($Timestamp->start_time)){
                $Timestamp->update([
                    'date' => Carbon::today(),
                    'start_time' => Carbon::now(),
            ]);
            }
            else{
                $Attendance = Attendance::create([
                    'user_id' => $user->id,
                    'date' => Carbon::today(),
                    'start_time' => Carbon::now()
                ]);
                $Rest = Rest::create([
                    'attendance_id' => $Attendance->id]);
            }
                return redirect()->back()->with('status', '出勤打刻が完了しました');
    }


    public function endAttendance()
    {
        $user = Auth::user();
        $Timestamp = Attendance::where('user_id', $user->id)->latest()->first();
        // 退勤ボタン押した時の日付取得
        $endTimestampDay = Carbon::today();
        // 退勤の日付と同じ日の出勤データを取得
        $startTimestamp = Attendance::where('user_id', $user->id)->whereDate('date',$endTimestampDay)->latest()->first();

            // もし退勤処理日と同じ日の出勤データがあって、退勤レコードが空のとき、
            // その日のデータに退勤処理をする
            if (isset($startTimestamp)&&empty($startTimestamp->end_time)){

            $Timestamp->update([
            'end_time' => Carbon::now(),
            ]);
                return redirect()->back()->with('status', '退勤打刻が完了しました.お疲れ様でした');
            }

            // それ以外のとき（当日以前の出勤データで退勤処理が行われてないものがあるとき）
            // 以前のデータには「0:00」で退勤、本日「0:00~現在時間」までの新しいデータを作成
            else{
                $dt=new Carbon();
                $Timestamp->update([
                'end_time' => $dt->setTime(23,59,59),
                ]);
                $Attendance = Attendance::create([
                    'user_id' => $user->id,
                    'date' => Carbon::today(),
                    'start_time' => $dt->setTime(0,0,0),
                    'end_time' =>Carbon::now()
                ]);
            }
    }


    public function getAttendance($num)
    {
        $user = Auth::user();
        // 日付表示
        $date=$num;
        $datestamp_sub=DateTime::createFromFormat('Y-m-d', $num);
        $subdate=$datestamp_sub->modify('+1 days');
        $datestamp_add=DateTime::createFromFormat('Y-m-d', $num);
        $adddate=$datestamp_add->modify('-1 days');

        // urlと同じ日付のデータを取得
        $items=Attendance::with('rest')->where('date',$date)->get();
        $items_pagi=Attendance::with('rest')->where('date',$date)->get()->paginate(5);


        return view('attendance', [
            'items_pagi' => $items,
            'date' => $date,
            'subdate' => $subdate,
            'adddate' => $adddate,
        ]);
    }

    //     // 休憩時間取得
    //     if(isset($rest_dates->start_time)&&isset($rest_dates->end_time))
    //     {
    //         $rest_start=strtotime(optional($rest_dates)->start_time);
    //         $rest_end=strtotime(optional($rest_dates)->end_time);
    //         $rest_differences= $rest_end-$rest_start;
    //         $rest_times=gmdate("H:i:s", $rest_differences);
    //     }



}


