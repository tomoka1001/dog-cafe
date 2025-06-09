@extends('admin.layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            {{-- <div>
                @if(session('message'))
                    <div>
                        {{ session('message') }}
                    </div>
                @endsession
            </div> --}}
            <form action="{{ route('admin.blogs.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">ブログ登録</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">保存</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="title">タイトル</label>
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="title" value="{{ old('title') }}">
                    </div>
                    @error('title')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    {{-- 画像エラー --}}
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

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="staff_id">スタッフ</label>
                        <select name="staff_id" id="staff_id" class="block w-full px-4 py-3 text-sm bg-white border rounded">
                            @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}" {{ old('staff_id') == $staff->id ? 'selected' : '' }}> 
                            {{ $staff->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

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