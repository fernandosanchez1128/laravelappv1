<?php

namespace App\Http\Requests\validate_Admin;

use Illuminate\Foundation\Http\FormRequest;

class validate_register_producto extends FormRequest
{
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
    {
        return [
            'nombre' => 'required|max:255|unique:productos,nombre',
            'precio_de_compra' => 'required',
            'precio_de_venta' => 'required',
            'cantidad' => 'required|max:11',
        ];

    }

    
}
