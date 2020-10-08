<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Task;
use Illuminate\Validation\Rule;


class EditTask extends CreateTask
{

    /**
     * 状態のnill不可、１〜３以外入力不可
     *
     */
    public function rules()
    {
      // 親(CreateTask)クラスのルールを利用する
      $rule = parent::rules();

      // Ruleクラスのin(1,2,3)を出力
      $status_rule = Rule::in(array_keys(Task::STATUS));

        return $rule + [
            //'status' => 'required|in(1,2,3)になる
            'status' => 'required|' .$status_rule,
        ];
    }

    /**
    *エラーログのカラム名日本語化
    *
    */
    public function attributes(){

      $attributes = parent::attributes();

      return $attributes + [
        'status' => '状態'
      ];
    }

    /**
    *クラス独自のエラーメッセージの追加
    *
    */
    public function messages(){

      $messages = parent::messages();

      // array('未着手','着手中','完了')を出力
      $status_labels = array_map(function($item){
        return $item['label'];
      }, Task::STATUS);

      $status_labels = implode('、', $status_labels);

      return $messages + [
        'status.in' => ':attribute には、 '.$status_labels.' のいずれかを指定してください。'
      ];
    }



}
