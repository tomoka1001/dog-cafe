<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>管理者ログイン</title>
  <link rel="stylesheet" href="/css/admin/normalize.css">
  <link rel="stylesheet" href="/css/admin/login.css">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
  <script src="/js/main.js"></script>
</head>
<body>
  <div class="container">
    <h1>管理者ログイン</h1>
    <form action="{{ route('admin.login') }}" method="POST">
    @csrf
      <div class="form-group">
        <div class="form-group">
          <label for="email">メールアドレス</label>
          <input type="email" id="email" name="email" placeholder="例:email@gmail.com" value="{{ old('email') }}">
          @error('email')
            <div class="error">{{ $message }}</div>
          @enderror
        </div>

        <div class="form-group">
          <label for="password">パスワード</label>
          <input type="password" id="password" name="password" placeholder="1asdf25f">
          @error('password')
            <div class="error">{{ $message }}</div>
          @enderror
        </div>
              
        <button type="submit">ログイン</button>
              
        <a href="/admin/users/create">ユーザー登録の手続きがまだの方</a>
      </div>
    </form>
  </div>
</body>
</html>
