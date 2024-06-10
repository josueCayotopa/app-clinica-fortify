<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConocimientoCreateRequest extends FormRequest
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
                'nombre'=>'required|min:3|max:100',
                'nivel'=>'required|in:Básico,Intermedio,Avanzado',       
        
        ];
    }



    public function messages()
    {
        return[
            'nombre.required'=>'Se requiere ingresar un nombre para crear conocimiento',
            'nivel.required' => 'El campo de rol es obligatorio.',    

        ];
        
    }
}
