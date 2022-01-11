@extends('layouts.Authlayout')
  @section('title','会員登録')
  @section('content')
    <div class="container">
      <form class="form-signin" method="post" action="{{ route('postRegister')}}">
        @csrf
          <h1 class="title-auth">会員登録</h1>
          @foreach ($errors->all() as $error)
              <ul class="alert alert-danger">
                <li>{{ $error }}</li>
              </ul>
          @endforeach
          <div class="form-atte">
              <input type="name" id="inputName" class="form-atte--input" name="name" placeholder="名前" autofocus>
              <input type="email" id="inputEmail" class="form-atte--input" name="email" placeholder="メールアドレス" autofocus>
              <input type="password" id="inputPassword" class="form-atte--input" name="password" placeholder="パスワード">
              <input type="password" id="inputConfirmPassword" class="form-atte--input" name="password_confirmation" placeholder="確認用パスワード">
              <button class="btn-input" type="submit">新規登録</button>
              <p>アカウントをお持ちの方はこちらから</p>
              <a class="btn-other" href="/login">ログイン</a>
          </div>
      </form>
    </div>

@endsection