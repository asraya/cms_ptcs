<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     User::create([
    //         'emp_id'  => 'CS1693',
    //         'user_name'  => 'asep.rayana',
    //         'email' => 'asep.rayana@ptcs.co.id',
    //         'password' => bcrypt('123456'),
    //         'status' => true,
    //         'api_token' => Str::random(60),

    //     ]);
    // }
public function run()
{
$array = ['emp_id' => 'CS1129', 'user_name'=>'Handi','email'=>'handi.irawan@ptcs.co.id','password'=>bcrypt('CS1129'), 'status' => true , 'api_token' => Str::random(60),

];
    
    \App\User::create($array);
}
}
