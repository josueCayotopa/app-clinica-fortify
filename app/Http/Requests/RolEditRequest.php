<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RolEditRequest extends FormRequest
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
        
            $role=$this->route('role');
            return [
                //
                'name'=>'unique:roles,name,'.$this->role.'|required'.'|min:3'.'|max:255' ,
  
            ];
        
    }
    public function messages()
    {    
        return[
            'name.required'=>'Se requiere ingresar su nombre para editar el rol',
            'name.min'=>'Se necesita mas de 3 caracteres',
            'name.max'=>'Se necesita menos de 255 caracteres',
            'name.unique'=>'Este rol ya esta en uso',
        ];
}
}
