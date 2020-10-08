<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTask extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'title' => 'required|max:100',
            'due_date' => 'required|date|after_or_equal:today'
        ];
    }

    /*
    *エラーログのカラム名日本語化
    *
    */
    public function attributes(){
      return [
        'title' => 'タスク名',
        'due_date' => '期限日'
      ];
    }


    /*
    *クラス独自のエラーメッセージの追加
    *
    */
    public function messages(){
      return [
        'due_date.after_or_equal' => ':attribute には今日以降の日付を入力してください。'
      ];
    }

}
