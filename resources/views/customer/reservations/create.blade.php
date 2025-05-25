@extends('customer/layouts.default')

@section('content')
<script src="/js/customer/reservations.js" defer></script>
<link rel="stylesheet" href="/css/customer/reservations.css">
<form action="{{ route('customer.reservations.store') }}" method="POST">
    @csrf
    <div>
        <ul>
    <div class="container">
        <div class="form">
            <label for="name">お名前<span class="must">必須</span></label>
            <input type="text"  id="name" name="name" class="@error('name') border-red-500 @enderror" value="{{ old('name') }}">
            <p id="errorMessageName" class="error"></p>
        </div>
        @error('name')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="name_kana">お名前（カナ）<span class="must">必須</span></label>
            <input type="text"  id="name_kana" name="name_kana" class="@error('name_kana') border-red-500 @enderror" value="{{ old('name_kana') }}">
            <p id="errorMessageNameKana" class="error"></p>
        </div>
        @error('name_kana')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="email">メールアドレス<span class="must">必須</span></label>
            <input type="email"  id="email" name="email" class="@error('email') border-red-500 @enderror" value="{{ old('email') }}">
            <p id="errorMessageEmail" class="error"></p>
        </div>
        @error('email')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="phone">電話番号<span class="must">必須</span></label>
            <input type="text"  id="phone" name="phone" class="@error('phone') border-red-500 @enderror" value="{{ old('phone') }}">
            <p id="errorMessagePhone" class="error"></p>
        </div>
        @error('phone')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="time">ご予約人数<span class="must">必須</span></label>
            <input type="number" id="people" name="people" min="1" max="10" class="@error('people') border-red-500 @enderror" value="{{ old('people') }}">
            <p id="errorMessagePeople" class="error"></p>
        </div>
        @error('people')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="time">ご予約日時（営業時間 11:00~18:00）<span class="must">必須 </span><br>※00分または30分の時間のみ選択</label>
            <input type="datetime-local" id="reserved_at" name="reserved_at" step="1800" class="@error('reserved_at') border-red-500 @enderror" value="{{ old('reserved_at') }}">
            <span class="validity"></span>
            <p id="errorMessageTime" class="error"></p>
        </div>
        @error('reserved_at')
        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
        @enderror

        <div class="form">
            <label for="body">ご要望<span class="any">任意</span></label>
            <textarea id="body" name="body">{{ old('body') }}</textarea>
        </div>
        <div>
            <button type="submit" id="btn" class="btn">予約する</button>
        </div>
    </div>
</form>
@endsection