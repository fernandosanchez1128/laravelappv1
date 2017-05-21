<?php

namespace App\Http\Requests\validate_visitors;

use Illuminate\Foundation\Http\FormRequest;

class validate_register_user extends FormRequest
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
            'email' => 'required|max:255|unique:users,email',
            'name' => 'required|max:255|unique:users,name',
            'password' => 'required|max:255',
        ];
    }
}
