<?php

namespace App\Http\Livewire;
use App\Models\cliente;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Clientes extends Component
{
    use WithPagination;

    public $clientes, $nombre, $direccion, $telefono, $fechNac, $id_cliente;
    public $modal= false;

    public function render()
    {
        $this->clientes = cliente::all();
        
        return view('livewire.clientes');
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
        $this->direccion = '';
        $this->telefono = '';
        $this->fechNac = '';
    }

    public function editar($id){
        $clientes = cliente::findOrFail($id);
        $this->id_cliente = $id;
        $this->nombre = $clientes->nombre_cliente;
        $this->direccion = $clientes->dirección_cliente;
        $this->telefono = $clientes->telefono_cliente;
        $this->fechNac = $clientes->fechaNac_cliente;
        $this->abrirModal();
    }

    public function borrar($id){
        cliente::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');

    }
    public function guardar(){
        
        cliente::updateOrCreate(['id'=>$this->id_cliente],
        [
            'nombre_cliente'=> $this->nombre,
            'dirección_cliente'=> $this->direccion,
            'telefono_cliente'=> $this->telefono,
            'fechaNac_cliente'=> $this->fechNac
        ]);

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
