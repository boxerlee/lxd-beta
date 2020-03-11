<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductBrand extends Model
{
    //
    protected $table = 'tbl_product_brand';

    protected $primaryKey = 'product_brand_id';

    public $incrementing = true;

    public $timestamps = false;
}
