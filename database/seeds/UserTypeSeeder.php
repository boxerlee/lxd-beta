<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_user_type')->insert([
            'user_type_name' => 'Admin'
        ]);
        DB::table('tbl_user_type')->insert([
            'user_type_name' => 'Customer'
        ]);
    }
}
