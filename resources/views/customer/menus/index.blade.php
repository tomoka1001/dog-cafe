@extends('customer.layouts.default')
@section('title', 'メニュー')

@section('content')
<link rel="stylesheet" href="{{ asset('css/customer/blog.css') }}">
<section>
  <div>
    <p><a href="/customer/index">トップ</a>＞メニュー</p>
  </div>
</section>

<section>
  <div class="container">
    @foreach ($menus as $menu)
    <div class="photo">
      <img src="{{ asset('storage/'. $menu->image) }}" alt="">
      <p class="text-xl">{{ $menu->name }}</p>
      <p class="leading-loose text-blueGray-400 mb-5 whitespace-pre-line">¥{{ $menu->price }}円</p>
    </div> 
    @endforeach
  </div>
</section>
@endsection