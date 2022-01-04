  <!-- 打刻ページ -->
  @extends('layouts.mainlayout')
  @section('title','ホーム')
  @section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-gray-200">

  <!------------ 勤務開始 ------------>
                      <div class="flex">
                        <div class="w-52 h-20 bg-white">
                          <form action="attendance/start" method="get">
                          @csrf
                          <button type="submit">勤務開始</button>
                          <input type="hidden" id="user_id" name="start_time" value="{{'start_time'}}"></form>
                        </div>
  <!------------ 勤務終了 ------------>
                        <div class="w-52 h-20 bg-white">
                          <form action="/attendance/end" method="get">
                          @csrf
                          <button type="submit">勤務終了</button>
                          <input type="hidden" id="user_id" name="end_time" value="{{'end_time'}}"></form>
                        </div>
  <!--  -->
                </div>
            </div>
        </div>
    </div>
  @endsection



