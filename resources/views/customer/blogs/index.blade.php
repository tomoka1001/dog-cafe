@extends('customer.layouts.default')
@section('title', 'ブログ一覧')

@section('content')
<link rel="stylesheet" href="{{ asset('css/customer/blog.css') }}">

<section>
    <div>
        <p><a href="/customer/index">トップ</a> ＞ ブログ</p>
        <h1>お店でのわんちゃんの様子をお届け！！</h1>
    </div>
</section>

<section>
    <div class="container">
        @foreach ($blogs as $blog)
        <div class="photo">
            <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
            <time>{{ $blog->updated_at->format('Y年m月d日') }}</time>
            <h2>{{ $blog->title }}</h2>
            <p>{{ $blog->body }}</p>
        </div>
        @endforeach
    </div>
</section>
@endsection
