<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class FoldersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //id=1のuser情報取得
        $user = DB::table('users')->first();


        $titles = ['プライベート', '仕事', '旅行'];

        foreach ($titles as $title) {
          DB::table('folders')->insert([
            'title'=>$title,
            'user_id'=> $user->id,
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now(),
          ]);
        }
    }
}
