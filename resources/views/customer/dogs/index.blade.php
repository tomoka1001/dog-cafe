@extends('customer.layouts.default')
@section('title', 'わんちゃんたち')

@section('content')
<link rel="stylesheet" href="/css/customer/blog.css">
<div>
  <p><a href="/customer/index">トップ</a>＞わんこ紹介</p>
  <h1>この子達があなたを癒やしてくれます！</h1>
</div>

<section>
    <div class="container">
    @foreach ($dogs as $dog)
      <div class="photo">
        <img src="{{ asset('storage/'. $dog->image) }}" alt="">
        <h2>{{ $dog->name }}</h2>
        <p>{{ $dog->body }}</p>
      </div>  
    @endforeach
    </div>
</section>
@endsection