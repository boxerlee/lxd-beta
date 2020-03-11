<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $table = 'tbl_user';

    protected $primaryKey = 'user_id';

    public $incrementing = true;

    public $timestamps = false;

    protected $attributes = [
        'user_type' => 2
    ];
}
