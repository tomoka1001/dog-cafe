<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreMenuRequest;
use App\Models\Menu;
use App\Http\Requests\Admin\updateMenuRequest;
use Illuminate\Support\Facades\Storage;

class AdminMenuController extends Controller
{
    // メニュー一覧画面
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', ['menus' => $menus]);
    }

    // メニュー投稿画面
    public function create()
    {
        return view('admin.menus.create');
    }

    // メニュー投稿処理
    public function store(StoreMenuRequest $request)
    {
        // StoreMenuRequestクラスで定義されたバリデーションルールに従って、リクエストの内容を検証する。
        // バリデーションを通過したデータだけが $validated に格納される。この時点では、画像ファイル（image）の中身はパスではなくアップロードファイルのまま。
        $validated = $request->validated();

        // フォームでアップロードされた画像を storage/app/public/menus/ に保存する。
        // store() は、ファイル名を自動生成し、保存パス（例: menus/abc123.jpg）を返します。public は「storage/app/public」を指す。
        //　それを $validated['image'] に上書きして、画像の保存先パスも含めた配列にする。
        $validated['image'] = $request->file('image')->store('manus', 'public');

        // Dog モデルを使って、新しいレコードをデータベースに保存する。
        // $validated には、すでに「バリデーション済みの入力データ」と「保存された画像のパス」が含まれている。
        Menu::create($validated);

        return to_route('admin.menus.index')->with('success', 'メニューを登録しました');

    }
    
    // 指定したIDのメニューを編集
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        return view('admin.menus.edit', ['menu' => $menu]);
    }

    // 指定したIDの更新処理
    public function update(UpdateMenuRequest $request, string $id)
    {
        $menu = Menu::findOrFail($id);
        $updateData = $request->validated();

        // 画像を変更する場合
        if($request->has('image')) {
            // 変更前の画像を削除
            Storage::disk('public')->delete($menu->image);
            // 変更後の画像をアップロード、保存パスを更新データにセット
            $updateData['image'] = $request->file('image')->store('menus', 'public');
        }
        $menu->update($updateData);

        return to_route('admin.menus.index')->with('success', 'メニューを更新しました');
    }

    // 指定したIDのブログの削除処理
    public function destroy(string $id
    )
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        Storage::disk('public')->delete($menu->image);

        return to_route('admin.menus.index')->with('success', 'メニューを削除しました');
    }
}
