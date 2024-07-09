<?php

namespace App\Http\Livewire;

use App\Models\RegimenPencionario;
use Livewire\Component;

class PensionRegimes extends Component
{
    public $regimenes;
    public $codigo_sunat, $descripcion, $estado, $regimen_id;
    public $updateMode = false;
    public $search = '';
    public function render()
    {
        $this->regimenes = RegimenPencionario::where(function ($query) {
            $query->where('codigo_sunat', 'like', '%' . $this->search . '%')
                ->orWhere('descripcion', 'like', '%' . $this->search . '%')
                ->orWhere('estado', 'like', '%' . $this->search . '%');
        })->get();

        return view('livewire.pension-regimes');
    }
    
    private function resetInputFields()
    {
        $this->codigo_sunat = '';
        $this->descripcion = '';
        $this->estado = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'codigo_sunat' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        RegimenPencionario::create($validatedData);

        session()->flash('message', 'Régimen creado exitosamente.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $regimen = RegimenPencionario::findOrFail($id);
        $this->regimen_id = $id;
        $this->codigo_sunat = $regimen->codigo_sunat;
        $this->descripcion = $regimen->descripcion;
        $this->estado = $regimen->estado;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'codigo_sunat' => 'required',
            'descripcion' => 'required',
            'estado' => 'required',
        ]);

        $regimen = RegimenPencionario::find($this->regimen_id);
        $regimen->update($validatedData);

        $this->updateMode = false;

        session()->flash('message', 'Régimen actualizado exitosamente.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        RegimenPencionario::find($id)->delete();
        session()->flash('message', 'Régimen eliminado exitosamente.');
    }
}
