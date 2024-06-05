<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            
            
            'razon_social' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'nombre_comercial' => 'required|string|max:255',
            'ruc_empresa' => 'required|string|max:20',
            'numero_decreto_supremo' => 'required|string|max:255',
            'nombre_representante_legal' => 'required|string|max:255',
            'tipo_documento_id' => 'required|exists:tipo_documentos,id',
            'numero_documento' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'numero_telefono' => 'required|string|max:20',
            'codigo_ubigeo' => 'required|string|max:20',
            'departamento_id' => 'required|exists:departamento__regions,id',
            'provincia_id' => 'required|exists:provincias,id',
            'distrito_id' => 'required|exists:distritos,id',
            'zona_id' => 'required|exists:zonas,id',
            'via_id' => 'required|exists:vias,id',
            'pais_id' => 'required|exists:nacionalidad,id',
            
        ];
        
    }
    public function messages()
    {
        return[
            
            
            'razon_social.required' => 'La razón social es obligatoria.',
            'direccion.required' => 'La dirección es obligatoria.',
            'nombre_comercial.required' => 'El nombre comercial es obligatorio.',
            'ruc_empresa.required' => 'El RUC de la empresa es obligatorio.',
            'numero_decreto_supremo.required' => 'El número de decreto supremo es obligatorio.',
            'nombre_representante_legal.required' => 'El nombre del representante legal es obligatorio.',
            'tipo_documento_id.required' => 'El tipo de documento es obligatorio.',
            'tipo_documento_id.exists' => 'El tipo de documento seleccionado no es válido.',
            'numero_documento.required' => 'El número de documento es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El formato del email no es válido.',
            'numero_telefono.required' => 'El número de teléfono es obligatorio.',
            'codigo_ubigeo.required' => 'El código de ubigeo es obligatorio.',
            'departamento_id.required' => 'El departamento es obligatorio.',
            'departamento_id.exists' => 'El departamento seleccionado no es válido.',
            'provincia_id.required' => 'La provincia es obligatoria.',
            'provincia_id.exists' => 'La provincia seleccionada no es válida.',
            'distrito_id.required' => 'El distrito es obligatorio.',
            'distrito_id.exists' => 'El distrito seleccionado no es válido.',
            'zona_id.required' => 'La zona es obligatoria.',
            'zona_id.exists' => 'La zona seleccionada no es válida.',
            'via_id.required' => 'La vía es obligatoria.',
            'via_id.exists' => 'La vía seleccionada no es válida.',
            'pais_id.required' => 'El país es obligatorio.',
            'pais_id.exists' => 'El país seleccionado no es válido.',
        ];
        
    }
}
