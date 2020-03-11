<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    //
    protected $table = 'tbl_product_type';

    protected $primaryKey = 'product_type_id';

    public $incrementing = true;

    public $timestamps = false;
}
