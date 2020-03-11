<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    //
    protected $table = 'tbl_users_type';

    protected $primaryKey = 'user_type_id';

    public $incrementing = true;

    public $timestamps = false;
}
