<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->string('product_name');
            $table->string('product_description');
            $table->float('product_price', 15);
            // $table->integer('product_quantity');
            $table->string('product_image_name');
            $table->unsignedInteger('product_brand');
            $table->unsignedInteger('product_type');
            $table->unsignedInteger('product_stock');
            $table->foreign('product_brand')->references('product_brand_id')->on('tbl_product_brand');
            $table->foreign('product_type')->references('product_type_id')->on('tbl_product_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_product');
    }
}
