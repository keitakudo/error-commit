<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Error; // 追加

class ErrorsController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            
            $data = [
                'user' => $user,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
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
        $error->title = $request->title;
        $error->process = $request->process;
        $error->screenshot = $request->screenshot;
        $error->url = $request->url;
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
        $message->title = $request->title;
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