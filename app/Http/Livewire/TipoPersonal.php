<?php

namespace App\Http\Livewire;

use App\Models\tipo_personal;
use Livewire\Component;
use Livewire\WithPagination;

class TipoPersonal extends Component
{
    use WithPagination;
    public $id_tipo, $descripcion;
    public $modal = false;
    public function render()
    {
        return view('livewire.tipo-personal',
        [
            'tipo_personals'=> tipo_personal::orderBy('id','asc')->paginate(10)
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
        $this->descripcion ='';
    }

    public function editar($id){
        $turno = tipo_personal::findOrFail($id);
        $this->id_tipo = $id;
        $this->descripcion = $turno->descripcion;
        $this->abrirModal();
    }

    public function borrar($id){
        tipo_personal::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');

    }
    public function guardar(){
        tipo_personal::updateOrCreate(['id'=>$this->id_tipo],
        [
            'descripcion'=> $this->descripcion
        ]);

        $this->cerrarModal();
        $this->limpiarCampos();
    }

}
