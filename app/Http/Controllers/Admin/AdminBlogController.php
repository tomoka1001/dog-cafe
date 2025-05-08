<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Models\Blog;
use App\Http\Requests\Admin\UpdateBlogRequest;
use Illuminate\Support\Facades\Storage;


class AdminBlogController extends Controller
{
    // ブログ一覧画面
    public function index()
    {
        $blogs = Blog::all();
        return view('/admin/blog/blog_index', ['blogs' => $blogs]);
    }

    // ブログ投稿画面
    public function create()
    {
        return view('/admin/blog/blog_create');
    }

    // ブログ投稿処理
    public function store(StoreBlogRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('blogs', 'public');
        Blog::create($validated);

        return to_route('admin.blogs.store')->with('success', 'ブログを投稿しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    // 指定したIDのブログ編集画面
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blog.edit', ['blog' => $blog]);
    }

    // 指定したIDのブログ更新処理
    public function update(UpdateBlogRequest $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $updateDate = $request->validated();

        // 画像を更新する場合
        if($request->has('image')) {
            // 更新前の画像を削除
            Storage::disk('public')->delete($blog->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateDate['image'] = $request->file('image')->store('blogs', 'public');
        }
        $blog->update($updateDate);

        return to_route('/admin/blog/blog_index')->with('success', 'ブログを更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
