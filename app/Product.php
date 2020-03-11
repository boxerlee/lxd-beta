<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'tbl_product';

    protected $primaryKey = 'product_id';

    public $incrementing = true;

    public $timestamps = false;

    protected $attributes = [
        'product_stock' => 0
    ];
}
