<?php

namespace App\Http\Livewire;

use App\Models\insumo_platos;
use App\Models\plato;
use Livewire\Component;
use Livewire\WithPagination;

class InsumoPlato extends Component
{
    use WithPagination;
    public $plato, $cantidad;
    public $modal= false;
    public function render()
    {
        return view('livewire.insumo-plato',[
            'platos'=>plato::get(),
            'insumo_platos'=>insumo_platos::orderBy('id','desc')->paginate(20)
        ]);
    }
    public function crear(){
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal(){
        $this->modal = true;
    }
    public function cerrarModal(){
        $this->modal = false;
    }

    public function limpiarCampos(){
        $this->nombre ='';
        $this->telefono = '';
        $this->direccion = '';
        $this->tipo = '';
        $this->turno = '';
    }
}
