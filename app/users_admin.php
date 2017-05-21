<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_admin extends Model
{



	protected $table = 'users_admins';

    protected $fillable = [
    	'id',
        'name',
        'email',
    ];

}
