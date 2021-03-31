<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Error; // 追加

class ErrorsController extends Controller
{
    public function index()
    {   
        $errorlogs= Error::orderBy('id', 'desc')->paginate(5);

            $data = [
                'errorlogs' => $errorlogs,
            ];
    

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    public function create()
    {
        $errorlog = new Error;
        
        return view('errorlogs.create',[
            'errorlog' => $errorlog,
            ]);
    }
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'process' => 'required|max:255',
        ]);

        // エラーを作成
        $errorlog = new Error;
        $errorlog->title = $request->title;
        $errorlog->process = $request->process;
        $errorlog->screenshot = $request->screenshot;
        $errorlog->url = $request->url;
        $errorlog->save();
        
        // トップページへリダイレクトさせる
        return redirect('/');
    }
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $errorlog = Error::findOrFail($id);

        // ユーザ詳細ビューでそれを表示
        return view('errorlogs.show', [
            'errorlog' => $errorlog,
        ]);
    }
    public function edit($id)
    {   
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'process' => 'required|max:255',
        ]);
        // idの値でメッセージを検索して取得
        $errorlog = Error::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('errorlogs.edit', [
            'errorlog' => $errorlog,
        ]);
    }

    // putまたはpatchでmessages/（任意のid）にアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {   
        // バリデーション
        $request->validate([
            'title' => 'required|max:255',
            'process' => 'required|max:255',
        ]);
        //idの値でメッセージを検索して取得
        $errorlog = Error::findOrFail($id);
        // メッセージを更新
        $errorlog->title = $request->title;
        $errorlog->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    // deleteでerrorlogs/（任意のid）にアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        //idの値でメッセージを検索して取得
        $errorlog = Error::findOrFail($id);
        
        $errorlog->delete();
        // トップページへリダイレクトさせる
        return redirect('/');
    }

}