<?php

namespace App\Http\Livewire;

use App\Models\AfpDescuentosPensiones;
use App\Models\DescuentoRegimemPencionario;
use App\Models\RegimenAfp;
use Livewire\Component;

class DescuentosPorMes extends Component
{
    public $afp_id;
    public $descuento_id;
    public $tipo_comision;
    public $fecha;
    public $porcentaje;
    public $importe_tope;
    public $descuento_descripcion;
    public $descuentos = [];
    public $regimenesAfp = [];
    public $descuentosPensiones = [];
    public function mount()
    {
        $this->regimenesAfp = RegimenAfp::all();
        $this->descuentos = DescuentoRegimemPencionario::all();
        $this->descuentosPensiones = AfpDescuentosPensiones::all();
    }

    protected $rules = [
        'afp_id' => 'required',
        'descuento_id' => 'required',
        'tipo_comision' => 'required|string',
        'fecha' => 'required|date',
        'porcentaje' => 'required|numeric',
        'importe_tope' => 'required|numeric',
        'descuento_descripcion' => 'required|string|max:255',
    ];

    public function store()
    {
        $this->validate();

        AfpDescuentosPensiones::create([
            'afp_id' => $this->afp_id,
            'descuento_id' => $this->descuento_id,
            'tipo_comision' => $this->tipo_comision,
            'fecha' => $this->fecha,
            'porcentaje' => $this->porcentaje,
            'importe_tope' => $this->importe_tope,
        ]);

        session()->flash('message', 'Descuento creado exitosamente.');

        $this->resetInputFields();
        $this->descuentosPensiones = AfpDescuentosPensiones::all();
    }

    public function addDescuento()
    {
        
        $this->validateOnly('descuento_descripcion');

        DescuentoRegimemPencionario::create([
            'descripcion' => $this->descuento_descripcion,
        ]);

        session()->flash('message', 'Nuevo descuento creado exitosamente.');

        $this->reset(['descuento_descripcion']);

        $this->emit('closeModal');
    }

    private function resetInputFields()
    {
        $this->afp_id = '';
        $this->descuento_id = '';
        $this->tipo_comision = '';
        $this->fecha = '';
        $this->porcentaje = '';
        $this->importe_tope = '';
    }

    public function render()
    {
        return view('livewire.descuentos-por-mes');
    }

}