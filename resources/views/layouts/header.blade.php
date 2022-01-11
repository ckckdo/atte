@extends('layouts.header-main')
        @section('navi')
        <nav style="display:inline-block;" class="flex my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="/">ホーム</a>
            <form method="get" action="{{ route('getAttendance','date') }}" style="display:inline;">
                @csrf
                <a class="p-2 text-dark" href="route('getAttendance')" onclick="event.preventDefault();
            this.closest('form').submit();">{{ __('日付一覧') }}
            </form></a>
            <form method="POST" action="{{ route('postLogout') }}" style="display:inline;">
                @csrf
                <a class="p-2 text-dark" href="route('postLogout')" onclick="event.preventDefault();
            this.closest('form').submit();">{{ __('ログアウト') }}
            </form></a>
        </nav>
        @endsection
    </div>
</header>