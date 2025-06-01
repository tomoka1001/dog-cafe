@extends('admin.layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div>
            <h1>{{ $email->name }} 様よりお問い合わせ下記の内容でお問い合わせがありました</h1>
            <p>内容を確認しご対応をお願いします。</p>
        </div>

        <div>
            <h2>【お問い合わせ内容】</h2>
            <p>名前：{{ $email->name }}</p>
            <p>ふりがな：{{ $email->name_kana }}</p>
            <p>メールアドレス：{{ $email->email }}</p>
            <p>電話番号：{{ $email->phone }}</p>
            <p>内容：{{ $email->body }}</p>
        </div>

        <div>
            <p>※このメールは配信専用のアドレスで配信されています。</p>
            <p>このメールに返信されても返信内容の確認およびご返答ができませんので、ご了承ください。</p>
        </div>
    </div>
</section>