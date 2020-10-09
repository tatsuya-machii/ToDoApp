<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Folder;
use App\Models\User;
use App\Models\Task;

class HomeController extends Controller
{
    //
    public function index(){

      // ユーザーの取得
      $user = Auth::user();

      // ログインに紐づくフォルダーをひとつ取得
      $folder = $user->folders()->first();

      // 上記で、ログインに紐づくフォルダーを取得できなければHomeにリダイレクト
      if (is_null($folder)) {
        return View('home');
      }else{

        // 上記で、ログインに紐づくフォルダーを取得できたらタスク一覧にリダイレクト
        return redirect(
          route('tasks.index', [
            'folder'=>$folder->id
          ])
        );
      }
    }
}
