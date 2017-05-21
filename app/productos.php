<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class productos extends Model
{
    
	use SoftDeletes;



	protected $table = 'productos';

	  
    protected $fillable = [
        'nombre',
        'cantidad',
        'precio_de_compra',
        'precio_de_venta',
        'ganancia_unitaria',
        'total_compra',
        'total_venta',
        'ganancia_total',
        'deleted_at',
    ];
   

}
