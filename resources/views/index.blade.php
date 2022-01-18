<!-- 打刻ページ -->
  <style>
    .container{
      padding:50px,auto;
      display:flex;
      justify-content:center;
      flex-wrap:wrap;
    }
    p{
      text-align:center;
      font-size:20px;
    }
    .card-atte{
      border:0px;
      margin:50px;
    }
    @media (min-width: 1200px) {
    .card-atte {
    margin-left:100px;
    margin-right:50px;
      }
    }

    .btn-atte{
      width:300px;
      height:150px;
      background:white;
      color:black;
      border:0px;
    }
    .btn-atte:disabled{
      color:#dcdcdc
    }
  </style>
  @extends('layouts.mainlayout')
  @section('title','ホーム')
  @section('content')

    <p>{{ Auth::user()->name }}さん {{ session('status') }}！</p>
    <p>{{ session('error') }}</p>


    <div class="container">
        <!-- 全部空のとき -->
        @if(!isset($items[0])&& !isset($items[1]) && !isset($items[2]) && !isset($items[3]))
              <!------------ 勤務開始 ------------>
                <div class="card-atte">
                <form action="/attendance/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_work" onclick="click1()" >勤務開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 勤務終了 ------------>
                <div class="card-atte">
                <form action="/attendance/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_work" onclick="click2()" disabled>勤務終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>
                <!------------ 休憩開始 ------------>
                <div class="card-atte">
                <form action="/rest/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_rest" onclick="click3()" disabled>休憩開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 休憩終了 ------------>
                <div class="card-atte">
                <form action="/rest/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_rest" onclick="click4()" disabled>休憩終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>



          <!------------------------ 出勤だけのとき ----------------------->
        @elseif(isset($items[0]) && !isset($items[1]) && !isset($items[2]) && !isset($items[3]))
                <!------------ 勤務開始 ------------>
                <div class="card-atte">
                <form action="/attendance/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_work" onclick="click1()" disabled>勤務開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 勤務終了 ------------>
                <div class="card-atte">
                <form action="/attendance/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_work" onclick="click2()">勤務終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>
                <!------------ 休憩開始 ------------>
                <div class="card-atte">
                <form action="/rest/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_rest" onclick="click3()">休憩開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 休憩終了 ------------>
                <div class="card-atte">
                <form action="/rest/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_rest" onclick="click4()">休憩終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>


          <!------------------------ 出勤・休憩のとき ----------------------->
        @elseif(isset($items[0]) && !isset($items[1]) && isset($items[2]) && !isset($items[3]))
                <!------------ 勤務開始 ------------>
                <div class="card-atte">
                <form action="/attendance/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_work" onclick="click1()" disabled>勤務開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 勤務終了 ------------>
                <div class="card-atte">
                <form action="/attendance/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_work" onclick="click2()">勤務終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>
                <!------------ 休憩開始 ------------>
                <div class="card-atte">
                <form action="/rest/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_rest" onclick="click3()" disabled>休憩開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 休憩終了 ------------>
                <div class="card-atte">
                <form action="/rest/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_rest" onclick="click4()">休憩終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>


          <!------------------------ 出勤・休憩開始・休憩終了のとき ----------------------->
        @elseif(isset($items[0])&& !isset($items[1]) && isset($items[2]) && isset($items[3]))
                <!------------ 勤務開始 ------------>
                <div class="card-atte">
                <form action="/attendance/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_work" onclick="click1()" disabled>勤務開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 勤務終了 ------------>
                <div class="card-atte">
                <form action="/attendance/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_work" onclick="click2()">勤務終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>
                <!------------ 休憩開始 ------------>
                <div class="card-atte">
                <form action="/rest/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_rest" onclick="click3()" disabled>休憩開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 休憩終了 ------------>
                <div class="card-atte">
                <form action="/rest/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_rest" onclick="click4()" disabled>休憩終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>

                <!------------------------ 全部入ってるとき ----------------------->
        @elseif(isset($items[0])&& isset($items[1]) && isset($items[2]) && isset($items[3]))
                <!------------ 勤務開始 ------------>
                <div class="card-atte">
                <form action="/attendance/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_work" onclick="click1()">勤務開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 勤務終了 ------------>
                <div class="card-atte">
                <form action="/attendance/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_work" onclick="click2()"disabled>勤務終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>
                <!------------ 休憩開始 ------------>
                <div class="card-atte">
                <form action="/rest/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_rest" onclick="click3()" disabled>休憩開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 休憩終了 ------------>
                <div class="card-atte">
                <form action="/rest/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_rest" onclick="click4()" disabled>休憩終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
          @else
                <!------------ 勤務開始 ------------>
                <div class="card-atte">
                <form action="/attendance/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_work" onclick="click1()">勤務開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 勤務終了 ------------>
                <div class="card-atte">
                <form action="/attendance/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_work" onclick="click2()"disabled>勤務終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
                </div>
                <!------------ 休憩開始 ------------>
                <div class="card-atte">
                <form action="/rest/start" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="start_rest" onclick="click3()" disabled>休憩開始</button>
                <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
                </div>
                <!------------ 休憩終了 ------------>
                <div class="card-atte">
                <form action="/rest/end" method="get">
                @csrf
                <button class="btn-atte" type="submit" id="end_rest" onclick="click4()" disabled>休憩終了</button>
                <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
          @endif

  @endsection


