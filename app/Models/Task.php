<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    use HasFactory;

    const STATUS = [
      1 => ['label' => '未着手', 'class'=>'label-danger'],
      2 => ['label' => '着手中', 'class'=>'label-info'],
      3 => ['label' => '完了', 'class'=>'']
    ];


    /**
    * 状態のラベルを取得
    *
    */
    public function getStatusLabelAttribute(){

      // 状態の値
      $status = $this->attributes['status'];

      // 定義されていなければカラ文字を返す
      if (!isset(self::STATUS[$status])) {
        return '';
      }

      return self::STATUS[$status]['label'];
    }


    /**
    * 状態を表すクラスを取得
    *
    */
    public function getStatusClassAttribute(){

      // 状態の値
      $status = $this->attributes['status'];

      // 定義されていなければカラ文字を返す
      if (!isset(self::STATUS[$status])) {
        return '';
      }

      return self::STATUS[$status]['class'];
    }

    /**
    *整形した期限日の取得
    *
    */
    public function getFormattedDueDateAttribute(){
      return Carbon::createFromFormat('Y-m-d', $this->attributes['due_date'])->format('Y/m/d');
    }

}
