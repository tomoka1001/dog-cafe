<!DOCTYPE html>
<html lang="ja">
    <head>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ユーザー登録</title>
    <link rel="stylesheet" href="/css/admin/normalize.css">
    <link rel="stylesheet" href="/css/admin/user.css">
    </head>
    <body>
        <div class="container">
            <h1>ユーザ登録</h1>
            <form action="{{ route('admin.users.store') }}" method="post">
            @csrf
                <div class="form-group">
                    <label for="name">名前</label>
                    <input type="text" id="name" name="name" placeholder="例:山田太郎" value="{{ old('name') }}">
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" name="email" placeholder="例:email@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">パスワード(8以上の英数字)</label>
                    <input type="password" id="password" name="password" placeholder="1asdf25f">
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">パスワード(確認)</label>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit">登録</button>
                </div>
            </form>
        </div>
    </body>
</html>