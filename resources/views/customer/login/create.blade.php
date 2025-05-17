@extends('customer/layouts.default')

@section('content')
<section>
    <h1>ユーザー登録</h1>
    {{-- {{ route('customer.login.store') }} --}}
    <form id="registerForm" action="" method="post">
        @csrf
        <h2>ユーザー名：<input type="text" name="name" id="name"></h2>
        <h2>メールアドレス：<input type="email" name="email" id="email"></h2>
        <h2>電話番号：<input type="text" name="phone" id="phone"></h2>
        <h2>パスワード：<input type="password" name="password" id="password"></h2>
        <h2>パスワード（確認）：<input type="password" name="password_confirmation" id="password_confirmation"></h2>
        <button type="submit">登録</button>
    </form>
</section>

<script>
document.getElementById('registerForm').addEventListener('submit', function(event) {
    // 値を取得
    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('password_confirmation').value;

    let errors = [];

    if (!name) errors.push("ユーザー名を入力してください");
    if (!email) errors.push("メールアドレスを入力してください");
    if (!phone) errors.push("電話番号を入力してください");
    if (!password) errors.push("パスワードを入力してください");
    if (!confirmPassword) errors.push("パスワード（確認）を入力してください");
    if (password && confirmPassword && password !== confirmPassword) errors.push("パスワードが一致しません");

    if (errors.length > 0) {
        event.preventDefault(); // フォーム送信を止める
        alert(errors.join("\n")); // エラーをアラートで表示
    }
});
</script>
@endsection
