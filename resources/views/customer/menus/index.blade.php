@extends('customer.layouts.default')
@section('title', 'メニュー')

@section('content')
<section class="bg-gray-100">
  <div class="container mx-auto">
    <p class="text-left px-4 pt-2"><a href="#" class="text-blue-600 hover:underline">トップ</a>&gt;メニュー</p>
    <p class="text-center pt-10 text-2xl">メニュー</p>
    {{-- <h1 class="mt-2 text-4xl font-bold font-heading text-center h-32">ワンちゃんのご飯もあります！</h1> --}}
  </div>
</section>

<section class="py-20 bg-blueGray-50">
  <div class="container px-4 mx-auto">
    <div class="flex flex-wrap">
        @foreach ($menus as $menu)
        <div class="w-full md:w-1/2 py-5 md:px-5">
            <div class="px-6 bg-white shadow rounded h-full py-10">
                <div class="flex items-center mb-4">
                    <img class="h-16 w-16 rounded-full object-cover" src="{{ asset('storage/'. $menu->image) }}" alt="">
                    <div class="pl-4">
                        <p class="text-xl">{{ $menu->name }}</p>
                    </div>
                </div>
                <p class="leading-loose text-blueGray-400 mb-5 whitespace-pre-line">¥{{ $menu->price }}円</p>
            </div>
        </div>  
        @endforeach
    </div>
  </div>
</section>
@endsection