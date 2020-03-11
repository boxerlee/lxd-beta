<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_user')->insert([
            'user_first_name' => 'Philaphonh',
            'user_last_name' => 'Inthavongsa',
            'user_email' => 'atyinthavongsa@gmail.com',
            'user_gender' => 'Male',
            'username' => 'artydev',
            'password' => Hash::make('hackerman'),
            'user_type' => 1
        ]);
        DB::table('tbl_user')->insert([
            'user_first_name' => 'Test',
            'user_last_name' => 'Test',
            'user_email' => 'test@test.com',
            'user_gender' => 'Male',
            'username' => 'test2test',
            'password' => Hash::make('test2test'),
            'user_type' => 2
        ]);
    }
}
