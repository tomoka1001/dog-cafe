<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Models\Blog;
use App\Models\Staff;
use App\Http\Requests\Admin\UpdateBlogRequest;
use Illuminate\Support\Facades\Storage;


class AdminBlogController extends Controller
{
    // ブログ一覧画面
    public function index()
    {
        // dd(Blog::all());
        // $staff = Staff::with('blogs')->find($id);
        $blogs = Blog::all();
        return view('admin.blogs.index', compact('blogs'));
    }

    // ブログ投稿画面
    public function create()
    {
        $staffs = Staff::all();
        return view('admin.blogs.create', compact('staffs'));
    }    

    // ブログ投稿処理
    public function store(StoreBlogRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('blogs', 'public');
        $blog = Blog::create($validated);

        // dd($request);

        return to_route('admin.blogs.store')->with('message', 'ブログを投稿しました');
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
        return view('admin.blogs.edit', compact('blog'));
    }

    // 指定したIDのブログ更新処理
    public function update(UpdateBlogRequest $request, string $id)
    {
        // $blog = Blog::findOrFail($id);string $id
        // $updateDate = $request->validated();

        // 画像を更新する場合
        // if($request->has('image')) {
        //     // 更新前の画像を削除
        //     Storage::disk('public')->delete($blog->image);
        //     // 変更後の画像をアップロード、保存パスを更新対象データにセット
        //     $updateDate['image'] = $request->file('image')->store('blogs', 'public');
        // }
        // $blog->update($updateDate);

        // return to_route('admin.blogs.index')->with('success', 'ブログを更新しました');

        $blog = Blog::findOrFail($id);
        $validated = $request->validated();
        // 画像を更新する場合
        if($request->has('image')) {
            // 更新前の画像を削除
            Storage::disk('public')->delete($blog->image);
            // 変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateDate['image'] = $request->file('image')->store('blogs', 'public');
        }
        $blog->update($validated);

        // dd($request);

        return to_route('admin.blogs.index')->with('message', 'ブログを更新しました');
    }

    // 指定したIDのブログの削除処理
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        // 更新前の画像削除
        Storage::disk('public')->delete($blog->image);
        $blog->delete();
        return to_route('admin.blogs.index')->with('message', "ブログを削除しました");

    }
}