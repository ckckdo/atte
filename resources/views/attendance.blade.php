<style>
  .container{
    width:100%;
  }

  .table{
    width:100%;
    text-align:center;
    border-top:1px solid #888;
    border-bottom:1px solid #888;
  }

  .table th td{
    border-bottom:1px solid #888;
  }
</style>
@extends('layouts.mainlayout')
  @section('title','日付別勤怠一覧')
  @section('content')
    <div class="container">
      {{ $dates->links() }}
        <table class="table">
              <tr>
                  <th>名前</th>
                  <th>勤務開始</th>
                  <th>勤務終了</th>
                  <th>休憩時間</th>
                  <th>勤務時間</th>
              </tr>
          <tbody>
              @if($dates)
                  @foreach($dates as $date)
                      <tr>
                          <td>{{ $date->user->name }}</td>
                          <td>{{ $date->start_time }}</td>
                          <td>{{ $date->end_time }}</td>
                          <td>@if($items)
                                @foreach($items as $item)
                                {{ $item->rest_time }}
                                @endforeach
                              @endif</td>
                          <td>{{ $date->attendance_time }}</td>
                  @endforeach
              @endif

          </tbody>
      </table>
    </div>
@endsection
