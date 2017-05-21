<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class publics extends Model
{
    protected $table = 'publics';
    protected $fillable = [
    	'texto',
    	'imagen',
    	'megusta',
    ];
}
