<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tbl_product_type')->insert([
            'product_type_name' => 'Computer',
            'product_type_url' => 'computer',
        ]);
        DB::table('tbl_product_type')->insert([
            'product_type_name' => 'Smartphone',
            'product_type_url' => 'smartphone',
        ]);
        DB::table('tbl_product_type')->insert([
            'product_type_name' => 'Digital Camera',
            'product_type_url' => 'camera',
        ]);
    }
}
