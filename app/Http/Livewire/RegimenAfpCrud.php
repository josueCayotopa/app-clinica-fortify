<?php

namespace App\Http\Livewire;

use App\Models\RegimenAfp;
use App\Models\RegimenPencionario;
use Livewire\Component;

class RegimenAfpCrud extends Component
{
    public $nombre;
    public $regimen_id;
    public $selected_id;
    public $updateMode = false;
    public $search = '';

    protected $rules = [
        'nombre' => 'required',
        'regimen_id' => 'required',
    ];

    public function render()
    {
        $query = RegimenAfp::query();

        if ($this->search) {
            $query->where('nombre', 'like', '%' . $this->search . '%');
        }

        $afps = $query->get();
        $regimenes = RegimenPencionario::all();

        return view('livewire.regimen-afp-crud', compact('afps', 'regimenes'));
    }

    private function resetInputFields()
    {
        $this->nombre = '';
        $this->regimen_id = '';
        $this->search = '';
    }

    public function store()
    {
        $this->validate();

        RegimenAfp::create([
            'nombre' => $this->nombre,
            'regimen_id' => $this->regimen_id,
        ]);

        session()->flash('message', 'Régimen AFP creado correctamente.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $afp = RegimenAfp::findOrFail($id);
        $this->selected_id = $id;
        $this->nombre = $afp->nombre;
        $this->regimen_id = $afp->regimen_id;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate();

        if ($this->selected_id) {
            $afp = RegimenAfp::find($this->selected_id);
            $afp->update([
                'nombre' => $this->nombre,
                'regimen_id' => $this->regimen_id,
            ]);

            $this->updateMode = false;

            session()->flash('message', 'AFP actualizado exitosamente.');
            $this->resetInputFields();
        }
    }

    public function delete($id)
    {
        RegimenAfp::find($id)->delete();
        session()->flash('message', 'AFP eliminado exitosamente.');
    }
}
