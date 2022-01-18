@extends('layouts.Authlayout')
    @section('title','ログイン')
    @section('content')

    <div class="container">
        <form class="form-signin" method="post" action="{{ route('postLogin')}}">
        @csrf
    <h1 class="title-auth">ログイン</h1>
    @foreach ($errors->all() as $error)
        <ul class="alert alert-danger">
            <li>{{ $error }}</li>
        </ul>
    @endforeach
    @if(session('login_error'))
        <div class="alert alert-danger">
            {{session('login_error')}}
        </div>
    @endif
    @if(session('logout'))
        <div class="alert alert-danger">
            {{session('logout')}}
        </div>
    @endif
        <div class="form-atte">
            <input type="email" id="inputEmail" class="form-atte--input" name="email" placeholder="メールアドレス" autofocus>
            <input type="password" id="inputPassword" class="form-atte--input" name="password" placeholder="パスワード">
            <button class="btn-input" type="submit">ログイン</button>
            <p>アカウントをお持ちでない方はこちらから</p>
            <a class="btn-other" href="/register">会員登録</a>
        </div>
    </div>
    </form>

@endsection