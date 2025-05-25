@extends('customer/layouts.default')

@section('content')
<section>
    <h1>ユーザー登録</h1>
    <form action="{{ route('customer.login.store') }}" method="POST">
        @csrf
        <h2>ユーザー名：<input type="text" name="name" id="name"></h2>
        <h2>ユーザー名（カナ）：<input type="text" name="name_kana" id="name_kana"></h2>
        <h2>メールアドレス：<input type="email" name="email" id="email"></h2>
        <h2>電話番号：<input type="text" name="phone" id="phone"></h2>
        <h2>パスワード：<input type="password" name="password" id="password"></h2>
        <h2>パスワード（確認）：<input type="password" name="password_confirmation" id="password_confirmation"></h2>
        
        <button type="submit">登録</button>
    </form>
</section>
@endsection
