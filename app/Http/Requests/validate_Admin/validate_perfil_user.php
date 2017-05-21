<?php

namespace App\Http\Requests\validate_admin;

use Illuminate\Foundation\Http\FormRequest;

class validate_perfil_user extends FormRequest
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
            /*a diferencia del registro para poder actualizar hay que pasarle el id*/
            'email' => 'required|max:255|unique:users,email,'.$this->get('id'),/*.$this->route->getparameter('productos'),*/
            'password' => 'required',
            'name' => 'required',
            'image' => 'image',
        ];
    }
}
