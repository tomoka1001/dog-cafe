@extends('customer/layouts.default')
@section('title', 'お問い合わせ完了')

@section('content')
<link rel="stylesheet" href="{{ asset('css/customer/email.css') }}">

<section>
  <div class="main">
    <p><a href="/customer/index">トップ</a>＞お問い合わせ</p>
    <h1>お問い合わせが完了しました</h1>
  </div>
</section>

<section>
  <div>
    <p>お問い合わせいただきありがとうございました。<br>
    通常お問い合わせから3営業日以内にご入力頂いたメールアドレスに返信させていただきます <br>
    恐れ入りますが、しばらくお待ちください。 <br>
    合わせて、info@nekocafe.xx.xx からの返信が受信できるように設定のご確認をお願い致します。 <br>
    なお、ご入力いただいたメールアドレス宛に受付完了メールを配信しております。 <br>
    完了メールが届かない場合、処理が正常に行われていない可能性があります。 <br>
    大変お手数ですが、再度お問い合わせの手続きをお願い致します。
    </p>

    <p class="info"><a href="/customer/index">トップページ</a>に戻る</p>
  </div>
</section>
@endsection