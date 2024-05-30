<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //

            'name' => 'required|min:3|max:100',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed',
            'roles' => 'required|array',
            'roles.*' => 'exists:roles,id'


        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Se requiere ingresar su nombre para crear el usuario',
            'username.required' => 'Se requiere ingresar su nombre de usuario para crear el usuario',
            'email.required' => 'Se requiere ingresar su correo electronico para crear el usuario',
            'password.required' => 'Se requiere ingresar su contraseña para crear el usuario',
            'name.min' => 'Se necesita mas de 3 caracteres',
            'name.max' => 'Se necesita menos de 20 caracteres',
            'email.email' => 'Se requiere que ser un correo electronico',
            'password.confirmed' => 'Las contraseñas no coinciden',


        ];
    }
}
