<?php

namespace App\Http\Livewire;

use App\Models\DescuentoRegimemPencionario;
use Livewire\Component;

class TipoDescuento extends Component
{
    public $descuentos, $descripcion, $descuento_id;
    public $isOpen = false;


    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->descripcion = '';
        $this->descuento_id = null;
    }

    public function store()
    {
        $this->validate([
            'descripcion' => 'required|unique:descuento_regimen_pensionarios,descripcion',
        ]);

        DescuentoRegimemPencionario::updateOrCreate(['id' => $this->descuento_id], [
            'descripcion' => $this->descripcion
        ]);

        session()->flash('message', $this->descuento_id ? 'Descuento Actualizado.' : 'Descuento Creado.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $descuento = DescuentoRegimemPencionario::findOrFail($id);
        $this->descuento_id = $id;
        $this->descripcion = $descuento->descripcion;

        $this->openModal();
    }

    public function delete($id)
    {
        DescuentoRegimemPencionario::find($id)->delete();
        session()->flash('message', 'Descuento Eliminado.');
    }
    public function render()
    {
        $this->descuentos = DescuentoRegimemPencionario::all();

        return view('livewire.tipo-descuento');
    }
}
