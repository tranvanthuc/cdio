<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	['username' => 'mem1' , 'password' => bcrypt('123') , 'name' => 'thuc', 'email' => 'thuc@gmail.com', 'phone' => '01285136039', 'address' => '123TT', 'image' => '...' , 'level_id' => 3 , 'major_id' => 2 ],

        	['username' => 'mem2' , 'password' => bcrypt('123') , 'name' => 'hung', 'email' => 'hung@gmail.com', 'phone' => '0993213922', 'address' => '123ASD', 'image' => '...' , 'level_id' => 3 , 'major_id' => 2],

        	['username' => 'mem3' , 'password' => bcrypt('123') , 'name' => 'thuong', 'email' => 'thuong@gmail.com', 'phone' => '0123954745', 'address' => '123YYY', 'image' => '...' , 'level_id' => 4 , 'major_id' => 3]
        ];

        $managers = [
            ['username' => 'super' , 'password' => bcrypt('123') , 'name'=> 'super' ,'level_id' => 0 ],
            ['username' => 'admin' , 'password' => bcrypt('123') , 'name'=> 'admin' ,'level_id' => 1 ],
            ['username' => 'thuc' , 'password' => bcrypt('123') , 'name'=> 'thuc' ,'level_id' => 2 ],
            ['username' => 'thong' , 'password' => bcrypt('123') , 'name'=> 'thong' ,'level_id' => 2 ],
            ['username' => 'minh' , 'password' => bcrypt('123') , 'name'=> 'minh' ,'level_id' => 2 ],
            ['username' => 'lai' , 'password' => bcrypt('123') , 'name'=> 'lai' ,'level_id' => 2 ]
        ];
        DB::table('users')->insert($managers);
        DB::table('users')->insert($users);
        
    }
}
