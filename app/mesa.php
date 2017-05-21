<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class mesa extends Model
{
    use SoftDeletes;

    protected $table = 'mesas';

    protected $fillable = [

    	'id',
    	'nombre',
    	'total_a_pagar',
    	'estado',
    	'comentario',
    	'productos',
    	'deleted_at',

    ];
}
