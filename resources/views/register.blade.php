<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/signin.css') }}">


  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
  <form class="form-signin" method="post" action="{{ route('postRegister')}}">
    @csrf
  <h1 class="h3 mb-3 font-weight-normal">会員登録</h1>
  @foreach ($errors->all() as $error)
      <ul class="alert alert-danger">
        <li>{{ $error }}</li>
      </ul>
  @endforeach
  <input type="name" id="inputName" class="form-control" name="name" placeholder="名前" autofocus>
  <input type="email" id="inputEmail" class="form-control" name="email" placeholder="メールアドレス" autofocus>
  <input type="password" id="inputPassword" class="form-control" name="password" placeholder="パスワード">
  <input type="password" id="inputConfirmPassword" class="form-control" name="confirm-password" placeholder="確認用パスワード">
  <button class="btn btn-lg btn-primary btn-block" type="submit">新規登録</button>
</form>

</body>
</html>