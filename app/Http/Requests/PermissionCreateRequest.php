<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionCreateRequest extends FormRequest
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
            'name'=>'required|min:3|max:255|unique:permissions',
        ];
    }
    public function messages()
    {
        return[
            'name.required'=>'Se requiere ingresar su nombre para crear el permiso',
            
            'name.min'=>'Se necesita mas de 3 caracteres',
            'name.max'=>'Se necesita menos de 255 caracteres',
            'name.unique'=>'Este permiso ya esta en uso',
          
            

        ];
        
    }
}
