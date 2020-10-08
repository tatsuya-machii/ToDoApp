<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        foreach(range(1,3) as $num){
          DB::table('tasks')->insert([
            'folder_id'=> 1,//folders_tableに無いIDが入っている場合はエラーが出るので注意。
            'title'=> "サンプルタスク{$num}",
            'status'=> $num,
            'due_date'=> Carbon::now()->addDay($num),
            'created_at'=> Carbon::now(),
            'updated_at'=> Carbon::now()
          ]);
        }

    }
}
