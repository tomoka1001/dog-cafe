@extends('customer/layouts.default')

@section('content')
<script src="/js/customer/thanks.js" defer></script>
<link rel="stylesheet" href="/css/customer/thanks.css">
<div> 
    @if(session('message'))
        <div>{{ session('message') }}</div>
    @endif
</div>

@if($reservation)
<div class="container">
    <div><h1>お名前：{{ $reservation->name }}</h1></div>
    <div><h1>お名前（カナ）：{{ $reservation->name_kana }}</h1></div>
    <div><h1>メールアドレス：{{ $reservation->email }}</h1></div>
    <div><h1>電話番号：{{ $reservation->phone }}</h1></div>
    <div><h1>ご予約人数：{{ $reservation->people }}</h1></div>
    <div><h1>ご予約日時：{{ $reservation->reserved_at }}</h1></div>
    <div><h1>ご要望：{{ $reservation->body }}</h1></div>
</div>
@endif
@endsection
