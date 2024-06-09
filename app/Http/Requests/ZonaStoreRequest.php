<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ZonaStoreRequest extends FormRequest
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
        
            'descrip_zona'=>'required|min:3|max:100',
        ];
    }


    public function messages()
    {
        return[
            'descrip_zona.required'=>'Se requiere ingresar un nombre para crear una zona',

        ];
        
    }
}
