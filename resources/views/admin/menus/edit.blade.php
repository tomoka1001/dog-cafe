@extends('admin.layouts.admin')

@section('content')
<section class="py-8">
    <div class="container px-4 mx-auto">
        <div class="py-4 bg-white rounded">
            <form action="{{ route('admin.menus.update', $menu) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex px-6 pb-4 border-b">
                    <h3 class="text-xl font-bold">メニュー編集</h3>
                    <div class="ml-auto">
                        <button type="submit" class="py-2 px-3 text-xs text-white font-semibold bg-indigo-500 rounded-md">編集</button>
                    </div>
                </div>

                <div class="pt-4 px-6">
                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="name">メニュー名</label>
                        <input id="title" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="text" name="name" value="{{ old('name', $menu->name) }}">
                    </div>
                    @error('name')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="image">画像</label>
                        <div class="flex items-end">
                            <img id="previewImage" src="{{ asset('storage/'. $menu->image) }}" data-noimage="{{ asset('storage/'. $menu->image) }}" alt="" class="rounded shadow-md w-64">
                            <input id="image" class="block w-full px-4 py-3 mb-2" type="file" accept='image/*' name="image">
                        </div>
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-medium mb-2" for="price">価格</label>
                        <input id="price" class="block w-full px-4 py-3 mb-2 text-sm bg-white border rounded" type="number" name="price" value="{{ old('price', $menu->price) }}">
                    </div>
                    @error('body')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
</section>

<script>
    // WAN's追加
    $('#js-pulldown').select2();

    // 画像プレビュー
    document.getElementById('image').addEventListener('change', e => {
        const previewImageNode = document.getElementById('previewImage')
        const fileReader = new FileReader()
        fileReader.onload = () => previewImageNode.src = fileReader.result
        if (e.target.files.length > 0) {
            fileReader.readAsDataURL(e.target.files[0])
        } else {
            previewImageNode.src = previewImageNode.dataset.noimage
        }
    })
</script>
@endsection