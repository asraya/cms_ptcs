<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

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
        $faker = Faker::create();
        foreach(range(0,731) as $i){
            DB::table('users')->insert([
                'emp_id'  => true,
                'user_name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('123456'),
                'status' => true,
                'api_token' => Str::random(60)
            ]);
        }
    }
}