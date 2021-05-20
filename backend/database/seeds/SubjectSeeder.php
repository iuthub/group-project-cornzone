<?php

use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'title' => 'Physics'
        ]);
        DB::table('subjects')->insert([
            'title' => 'English'
        ]);
        DB::table('subjects')->insert([
            'title' => 'Calculus'
        ]);
        DB::table('subjects')->insert([
            'title' => 'Chemistry'
        ]);
        DB::table('subjects')->insert([
            'title' => 'Biology'
        ]);
        DB::table('subjects')->insert([
            'title' => 'History'
        ]);
    }
}
