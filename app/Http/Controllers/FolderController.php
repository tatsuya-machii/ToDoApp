<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Folder;
use App\Http\requests\CreateFolder;
use Illuminate\Support\Facades\Auth;


class FolderController extends Controller
{
    /*
    *フォルダ作成フォームの表示
    *
    */
    //引数にインポートしたrequestクラスを受け入れる
    public function showCreateForm(){
      return View('folders/create');
    }

    /*
    *フォルダ作成アクション
    *
    */
    public function create(CreateFolder $request){

      // フォルダモデルのインスタンスを作成する
      if ($folder = new Folder()) {
      }else{
        echo 'error';
      }
      // タイトルに入力値を代入する
      $folder->title = $request->title;
      // ユーザーに紐付けて保存
      Auth::user()->folders()->save($folder);

      return redirect()->route('tasks.index',[
        'folder' => $folder->id
      ]);
    }


}
