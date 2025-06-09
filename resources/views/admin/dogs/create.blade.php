@extends('admin.layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            @if(session('message'))
            <div>
                {{ session('message') }}
            </div>
            @endif
            <form action="{{ route('admin.dogs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">WAN's登録</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">保存</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    {{-- 名前のエラー --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="name">名前</label>
                        <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    {{-- 画像のエラー --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-end">
                            <img id="previewImage" src="/images/admin/noimage.jpg" data-noimage="/images/admin/noimage.jpg" alt="" class="rounded shadow-md w-64">
                            <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
                        </div>
                    </div>
                    @error('image')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                    

                    {{-- 本文エラー --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="body">本文</label>
                        <textarea id="body" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" name="body" rows="5">{{ old('body') }}</textarea>
                    </div>
                    @error('body')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</section>
@endsection