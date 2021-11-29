<?php

namespace App\Http\Livewire;

use App\Models\mesa as ModelsMesa;
use Livewire\Component;
use Livewire\WithPagination;

class Mesa extends Component
{
    use WithPagination;
    public $cantMax, $ubicacion, $id_mesa, $mesas;
    public $modal = false;
    public function render()
    {
        $this->mesas = ModelsMesa::all();    
        return view('livewire.mesa');
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
        $this->cantMax ='';
        $this->ubicacion = '';

    }
    public function editar($id){
        $mesa = ModelsMesa::findOrFail($id);
        $this->id_mesa =$id;
        $this->cantMax = $mesa->CantMaxComensales;
        $this->ubicacion = $mesa->Ubicacion;
        $this->abrirModal();
    }
    public function borrar($id){
        ModelsMesa::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');

    }
    public function guardar(){
        ModelsMesa::updateOrCreate(['id'=>$this->id_mesa],[
            'CantMaxComensales'=>$this->cantMax,
            'Ubicacion'=>$this->ubicacion
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
