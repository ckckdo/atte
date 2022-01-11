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
        <input type="hidden"  name="end_time" value="{{'end_time'}}"></form>
      </div>
    </div>

  <!-- <script>

    function click1() {
          document.getElementById("start_work").disabled = true;
          document.getElementById("end_work").disabled = false;
          document.getElementById("start_rest").disabled = false;
        }

        function click2() {
          document.getElementById("end_work").disabled = true;
          document.getElementById("start_work").disabled = false;
          document.getElementById("start_rest").disabled = true;
          document.getElementById("end_rest").disabled = true;
        }

        function click3() {
          document.getElementById("start_rest").disabled = true;
          document.getElementById("end_rest").disabled = false;
        }

        function click4() {
          document.getElementById("end_rest").disabled = true;
        }
  </script> -->
  @endsection


