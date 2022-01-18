<!------------ 勤務開始 ------------>
              <div class="card-atte">
              <form action="/attendance/start" method="get">
              @csrf
              <button class="btn-atte" type="submit" id="start_work" onclick="click1() @yield('at_start')">勤務開始</button>
              <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
              </div>
              <!------------ 勤務終了 ------------>
              <div class="card-atte">
              <form action="/attendance/end" method="get">
              @csrf
              <button class="btn-atte" type="submit" id="end_work" onclick="click2() @yield('at_end')">勤務終了</button>
              <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
              </div>
              <!------------ 休憩開始 ------------>
              <div class="card-atte">
              <form action="/rest/start" method="get">
              @csrf
              <button class="btn-atte" type="submit" id="start_rest" onclick="click3() @yield('rest_start')">休憩開始</button>
              <input type="hidden" name="start_time" value="{{'start_time'}}"></form>
              </div>
              <!------------ 休憩終了 ------------>
              <div class="card-atte">
              <form action="/rest/end" method="get">
              @csrf
              <button class="btn-atte" type="submit" id="end_rest" onclick="click4() @yield('rest_end')">休憩終了</button>
              <input type="hidden" name="end_time" value="{{'end_time'}}"></form>
              </div>