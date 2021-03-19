<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Error; // 追加

class ErrorsController extends Controller
{
    public function index()
    {
        // エラー一覧をidの降順で取得
        $errors = Error::orderBy('id', 'desc')->paginate(10);

        // エラー一覧ビューでそれを表示
        return view('errorrs.index', [
            'errors' => $errors,
        ]);
    }
    public function create()
    {
        $error = new Error;
        
        return view('errors.create',[
            'error' => $error,
            ]);
    }
    public function store(Request $request)
    {
         // エラーを作成
        $error = new Error;
        $error->content = $request->content;
        $error->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $error = Error::findOrFail($id);

        // ユーザ詳細ビューでそれを表示
        return view('errors.show', [
            'error' => $error,
        ]);
    }
    public function edit($id)
    {
        // idの値でメッセージを検索して取得
        $error = Error::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('errors.edit', [
            'error' => $error,
        ]);
    }

    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        // メッセージを更新
        $message->content = $request->content;
        $message->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // deleteでmessages/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //idの値でメッセージを検索して取得
        $message = Message::findOrFail($id);
        // メッセージを削除
        $message->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

}