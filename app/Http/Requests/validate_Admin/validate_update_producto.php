<?php

namespace App\Http\Requests\validate_Admin;

use Illuminate\Foundation\Http\FormRequest;
/*use Illuminate\Routing\Route;importar las rutas*/

class validate_update_producto extends FormRequest
{
    /*constructor para que esta vairable sea valida entodos los metodos
    public function __construct(Route $route){
        $this->route = $route;
    }*/


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {/*,.$this->route->getparameter('productos'),*/
         return [
            /*a diferencia del registro para poder actualizar hay que pasarle el id*/
            'nombre' => 'required|max:255|unique:productos,nombre,'.$this->get('id'),/*.$this->route->getparameter('productos'),*/
            'precio_de_compra' => 'required',
            'precio_de_venta' => 'required',
            'cantidad' => 'required|max:11',
        ];
    }
}
