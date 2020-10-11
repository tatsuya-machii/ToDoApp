<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Folder;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /*
    *一覧表示
    *(index)
    *
    */
    public function index(Folder $folder){

      // フォルダの取得
      $folders = Auth::user()->folders()->get();

      // if (is_null($current_folder)) {
      //   // abortは例外が投げられるので、それ以下の処理は実行されない。
      //   abort(404);
      // }
      // if ( Auth::user()->id !== $folder->user_id ) {
      //   abort(403);
      // }

      // 選ばれたフォルダに紐づくタスクを取得
      $tasks = $folder->tasks()->get();


      return View('tasks/index', [
        'folders'=>$folders,
        'current_folder_id'=>$folder->id,
        'tasks'=>$tasks,
      ]);
    }

    /*
    *タスク作成フォームの表示
    *(showCreateForm)
    *
    */
    public function showCreateForm(Folder $folder){
      return View('tasks.create', [
        'id' => $folder->id
      ]);
    }

    /*
    *タスク作成アクション
    *(create)
    *
    */
    public function create(Folder $folder, CreateTask $request){

      $current_folder = $folder;

      $task = new Task();
      $task->title = $request->title;
      $task->due_date = $request->due_date;
      $current_folder->Tasks()->save($task);

      return redirect()->route('tasks.index', ['folder'=>$current_folder->id]);
    }

    /**
    *タスク編集フォームの表示
    *(showEditForm)
    *
    */
    public function showEditForm(Folder $folder, Task $task){

      $this->checkRelation($folder, $task);

      return View('tasks.edit', [
        'task' => $task
      ]);
    }

    /**
    *タスク編集アクション
    *(edit)
    *
    */
    public function edit(Folder $folder, Task $task, EditTask $request){

      $this->checkRelation($folder, $task);

      $current_folder = $folder;

      // タスクの編集
      $task->title = $request->title;
      $task->status = $request->status;
      $task->due_date = $request->due_date;
      $current_folder->tasks()->save($task);

      //タスク一覧ページにリダイレクト
      return redirect()->route('tasks.index',['folder'=>$current_folder->id]);
    }

    private function checkRelation(Folder $folder, Task $task){
      if ($folder->id !== $task->folder_id) {
        abort(404);
      }
    }




}
