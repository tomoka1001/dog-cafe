@extends('admin.layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div>
            <h1>{{ $reservation->name }} 様よりご予約がありました。</h1>
            <p>内容を確認しご対応をお願いします。</p>
        </div>

        <div>
            <h2>【ご予約内容内容】</h2>
            <p>名前：{{ $reservation->name }}</p>
            <p>ふりがな：{{ $reservation->name_kana }}</p>
            <p>メールアドレス：{{ $reservation->email }}</p>
            <p>電話番号：{{ $reservation->phone }}</p>
            <p>ご予約人数：{{ $reservation->people }}</p>
            <p>ご予約日：{{ $reservation->reserved_date }}</p>
            <p>ご予約時間：{{ $reservation->reserved_time }}</p>
            <p>ご要望：{{ $reservation->body }}</p>
        </div>
    </div>
</section>