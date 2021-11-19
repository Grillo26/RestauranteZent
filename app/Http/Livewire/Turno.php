<?php

namespace App\Http\Livewire;

use App\Models\turno as ModelsTurno;
use Livewire\Component;
use Livewire\WithPagination;

class Turno extends Component
{
    use WithPagination;
    public $turno, $id_turno, $descripcion;
    public $modal = false;
    public function render()
    {
        $this->turnos = ModelsTurno::all();
        return view('livewire.turno');
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
    public function editar($id){
        $turno = ModelsTurno::findOrFail($id);
        $this->id_turno = $id;
        $this->descripcion = $turno->descripcion;
        $this->abrirModal();
    }

    public function borrar($id){
        ModelsTurno::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');

    }
    public function limpiarCampos(){
        $this->descripcion ='';
    }

    public function guardar(){
        
        ModelsTurno::updateOrCreate(['id'=>$this->id_turno],
        [
            'descripcion'=> $this->descripcion
        ]);

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}

