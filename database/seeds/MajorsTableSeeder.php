<?php

use Illuminate\Database\Seeder;

class MajorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $majors = [
    		['name' => 'Software Engineering'],
    		['name' => 'Software Engineering CMU'],
    		['name' => 'PSU']
    	];
        DB::table('majors')->insert($majors);
    }
}
