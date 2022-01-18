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

  .table td{
    border-bottom:1px solid #888;
    vertical-align: middle;
  }
  .table th{
    border-bottom:1px solid #888;
    vertical-align: middle;
  }
  .table tr{
    height:60px;
  }

  .date-ttl{
    text-align:center;
    margin:30px 0;
    display:flex;
    justify-content:center;
    align-items:center;
  }
  .date-link{
    display:inline-block;
    font-size:20px;
    line-height:30px;
    width:40px;
    height:30px;
    color:#0e6efd;
    background-color:white;
    border:1px solid #0e6efd;
  }
  .date{
    font-size:28px;
    margin:0 30px;
  }
  .date-ttl form{
    justify-content:center;
    align-items:center;
  }
  .page{
    margin-top:50px;
  }

</style>
@extends('layouts.mainlayout')
  @section('title','日付別勤怠一覧')
  @section('content')
    <div class="container">

      <div class="date-ttl">
        <form method="get" action="{{ route('getAttendance',['num' => $adddate->format('Y-m-d')]) }}" style="display:flex;">
                @csrf
        <a href="{{ route('getAttendance',['num' => $adddate->format('Y-m-d')]) }}" class="date-link"><</a>
        <p class="date">{{ $date }}</p>
        <form method="get" action="{{ route('getAttendance',['num' => $subdate->format('Y-m-d')]) }}" style="display:flex;">
                @csrf
        <a href="{{ route('getAttendance',['num' => $subdate->format('Y-m-d')]) }}" class="date-link">></a>
      </div>

    

      <table class="table">
              <tr>
                  <th>名前</th>
                  <th>勤務開始</th>
                  <th>勤務終了</th>
                  <th>休憩時間</th>
                  <th>勤務時間</th>
              </tr>
          <tbody>
                  @foreach($items as $item)
                      <tr>
                          <td>{{ $item->user->name }}</td>
                          <td>{{ $item->start_time }}</td>
                          <td>{{ $item->end_time }}</td>
                          <td>
                            </td>
                          <td>{{ gmdate("H:i:s",(strtotime($item->end_time)-strtotime($item->start_time))) }}</td>
                  @endforeach

          </tbody>
      </table>
      <div class="page">
      {{ $dates->links() }}
      </div>
    </div>
@endsection
