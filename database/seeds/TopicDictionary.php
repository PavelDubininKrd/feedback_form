<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicDictionary extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('topics_dict')->insert([
            ['id' => '1', 'topic' => 'Вопрос'],
            ['id' => '2', 'topic' => 'Предложение'],
            ['id' => '3', 'topic' => 'Ошибка на сайте'],
        ]);
    }
}
