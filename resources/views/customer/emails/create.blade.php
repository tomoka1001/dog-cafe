@extends('customer/layouts.default')
@section('title', 'お問い合わせ')

@section('content')
<link rel="stylesheet" href="{{ asset('css/customer/email.css') }}">

<section>
  <div class="main">
    <p><a href="/customer/index">トップ</a>＞お問い合わせ</p>
    <h1>お問い合わせ</h1>
  </div>
</section>

<section>
  <div class="container">
    <p>以下のフォームに必要事項をご入力の上、ご送信下さい。<br>
      通常お問い合わせから3営業日以内にご入力いただいたメールアドレスに返信させていただきます。<br>
      なお、info@nekocafe.xx.xxからの返信が受信できるように事前に設定のご確認をお願い致します。
    </p>
    <div>
      <form action="{{ route('customer.emails.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">お名前<span>必須</span></label>
          <input id="name" type="text" placeholder="例：田中太郎" name="name" value="{{ old('name') }}">
        </div>
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror

        <div class="form-group">
          <label for=name_kana>お名前（フリガナ）<span>必須</span></label>
          <input id="name_kana" type="text" placeholder="例：タナカタロウ" name="name_kana" value="{{ old('name_kana') }}">
        </div>
        @error('name_kana')
        <p class="error">{{ $message}}</p>
        @enderror

        <div class="form-group">
          <label for="phone">電話番号</label>
          <input id="phone" type="text" placeholder="例：0312345678" name="phone" value="{{ old('phone') }}">
        </div>
        @error('phone')
        <p class="error">{{ $message}}</p>
        @enderror

        <div class="form-group">
          <label for="email">メールアドレス<span>必須</span></label>
          <input id="email" type="email" placeholder="例：info@example.com" name="email" value="{{ old('email') }}">
        </div>
        @error('email')
        <p class="error">{{ $message}}</p>
        @enderror

        <div class="form-group">
          <label for="body">お問い合わせ内容<span>必須</span></label>
          <textarea id="body" type="text" placeholder="ご自由にご記入ください" name="body">{{ old('body') }}</textarea>
        </div>
        @error('body')
        <p class="error">{{ $message}}</p>
        @enderror

        <button type="submit">送信</button>
      </form>
    </div>
  </div>
</section>
@endsection