<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductBrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Apple',
            'product_brand_url' => 'apple',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Microsoft',
            'product_brand_url' => 'microsoft',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Google',
            'product_brand_url' => 'google',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'MSI',
            'product_brand_url' => 'msi',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Asus',
            'product_brand_url' => 'asus',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Nikon',
            'product_brand_url' => 'nikon',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Canon',
            'product_brand_url' => 'canon',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Sony',
            'product_brand_url' => 'sony',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Samsung',
            'product_brand_url' => 'samsung',
        ]);
        DB::table('tbl_product_brand')->insert([
            'product_brand_name' => 'Huawei',
            'product_brand_url' => 'huawei',
        ]);
    }
}
