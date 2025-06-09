<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\storeDogRequest;
use App\Http\Requests\Admin\UpdateDogRequest;
use App\Models\Dog;
use LaravelLang\Publisher\Console\Update;
use Illuminate\Support\Facades\Storage;


class AdminDogController extends Controller
{
    // 犬管理一覧表
    public function index()
    {
        // Dogモデルを使って、dogsテーブルの全レコードを取得する。
        // all() メソッドは、SQLの SELECT * FROM dogs に相当し、全件をEloquentのコレクションとして返す。
        // 返ってくる$dogs は、配列のように扱えるコレクション（Illuminate\Database\Eloquent\Collection）です。
        $dogs = Dog::all();

        // ['dogs' => $dogs] で、Bladeに $dogs という変数を渡しています。
        return view('admin.dogs.index', compact('dogs'));

    }

    // 犬追加画面
    public function create()
    {
        return view('admin.dogs.create');
    }

    // 犬追加処理
    // storeメソッドは、POSTで送られてきたデータを保存する処理を表す。　　バリデーションとは、ユーザーがフォームなどから送信したデータが正しい形式かどうかをチェックする処理のこと。
    public function store(storeDogRequest $request) 
    {
        // フォームでアップロードされた画像を storage/app/public/dogs/ に保存する。
        // store() は、ファイル名を自動生成し、保存パス（例: dogs/abc123.jpg）を返します。public は「storage/app/public」を指す。
        // $savedImagePath = $request->file('image')->store('dogs', 'public');

        // バリデーション済みのデータを使って、Dog モデルのインスタンスを作成する。ただし、この時点ではまだ保存されてない。
        // $dog = new Dog($request->validated());

        // 先ほど保存した画像のパスを、$dog->image に代入する。
        // $dog->image = $savedImagePath;

        // モデルをデータベースに保存する。
        // $dog->save();

        // return to_route('admin.dogs.index')->with('success', 'ワンちゃんを登録しました');




        // StoreDogRequestクラスで定義されたバリデーションルールに従って、リクエストの内容を検証する。
        // バリデーションを通過したデータだけが $validated に格納される。この時点では、画像ファイル（image）の中身はパスではなくアップロードファイルのまま。
        $validated = $request->validated();

        // フォームでアップロードされた画像を storage/app/public/dogs/ に保存する。
        // store() は、ファイル名を自動生成し、保存パス（例: dogs/abc123.jpg）を返します。public は「storage/app/public」を指す。
        //　それを $validated['image'] に上書きして、画像の保存先パスも含めた配列にする。
        $validated['image'] = $request->file('image')->store('dogs', 'public');

        // Dog モデルを使って、新しいレコードをデータベースに保存する。
        // $validated には、すでに「バリデーション済みの入力データ」と「保存された画像のパス」が含まれている。
        $dob = Dog::create($validated);

        return to_route('admin.dogs.index')->with('massege', 'ワンちゃんを登録しました');
    }

    // 指定したIDの編集画面
    // string $id は、URLのパラメータとして渡ってくる犬のID。
    public function edit(string $id)
    {
        // Dog::findOrFail($id) は、dogs テーブルから指定されたIDの犬のレコードを1件取得します。
        // 見つからなければ404エラーを自動的に返します。これは find($id) と違って、null チェックを書く必要がない便利なメソッドです。
        $dog = Dog::findOrFail($id);

        return view('admin.dogs.edit', compact('dog'));
    }


    // 指定したIDの更新処理
    public function update(UpdateDogRequest $request, string $id)
    {
        $dog = Dog::findOrFail($id);
        $validated = $request->validated();

        // 画像を更新する場合
        if($request->has('image')) {
            // 更新前の画像削除
            Storage::disk('public')->delete($dog->image);
            // 更新後の画像をアップロード、保存パスを更新対象データにセット
            $updateDate['image'] = $request->file('image')->store('dogs', 'public');
        }
        $dog->update($validated); 

        return to_route('admin.dogs.index')->with('success', "WAN'sを更新しました");
    }

    // 指定したIDのWAN'sの削除処理
    public function destroy(string $id)
    {
        $dog = Dog::findOrFail($id);
        // 更新前の画像削除
        Storage::disk('public')->delete($dog->image);
        $dog->delete();

        return to_route('admin.dogs.index')->with('success', "WAN'sを削除しました");

    }
}
