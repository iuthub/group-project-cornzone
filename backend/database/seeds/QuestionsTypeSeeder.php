<?php

use Illuminate\Database\Seeder;

class QuestionsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('question_types')->insert([
            'title' => 'Simple Question'
        ]);
        DB::table('question_types')->insert([
            'title' => 'True-False Question'
        ]);
        DB::table('question_types')->insert([
            'title' => 'Multiple Choice Question'
        ]);
    }
}
