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
            <form action="{{ route('admin.staffs.update', $staff) }}" method="POST">
                @csrf
                @method('put')
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">スタッフ更新</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">更新</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    {{-- タイトル未入力 --}}
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="name">名前</label>
                        <input id="name" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name', $staff->name) }}">
                    </div>
                </div>
                @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </form>
        </div>
    </div>
</section>
@endsection