<?php

namespace App\Http\Livewire;

use App\Models\personal as ModelsPersonal;
use Illuminate\Database\Events\ModelsPruned;
use Livewire\Component;
use Livewire\WithPagination;

class Personal extends Component
{
    use WithPagination;
    public $nombre, $telefono, $direccion, $tipo, $turno, $id_personal;
    public $modal = false;

    public function render()
    {
        return view('livewire.personal',['personals'=> ModelsPersonal::orderBy('id','desc')->paginate(20)]);

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

    public function editar($id){
        $personal = ModelsPersonal::findOrFail($id);
        $this->id_personal =$id;
        $this->nombre = $personal->nombre_personal;
        $this->telefono = $personal->telefono_personal;
        $this->direccion = $personal->direccion_personal;
        $this->tipo = $personal->id_tipo;
        $this->turno = $personal->id_turno;
        $this->abrirModal();
    }

    public function borrar($id){
        ModelsPersonal::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');

    }

    public function guardar(){
        ModelsPersonal::updateOrCreate(['id'=>$this->id_personal],[
            'nombre_personal'=>$this->nombre,
            'telefono_personal'=>$this->telefono,
            'direccion_personal'=>$this->direccion,
            'id_tipo'=>$this->tipo,
            'id_turno' => $this->turno
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }

}
