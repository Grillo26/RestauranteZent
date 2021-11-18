<?php

namespace App\Http\Livewire;
use App\Models\cliente;
use App\Models\cliente as ModelsCliente;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\PseudoTypes\False_;
use Symfony\Contracts\Service\Attribute\Required;

class Clientes extends Component
{
    use WithPagination;

    public $cliente, $nombre, $direccion, $telefono, $fechNac, $ob, $id_cliente;
    public $modal= false;

    public function render()
    {
        /*$this->clientes = cliente::all();    
        return view('livewire.clientes');*/

        return view('livewire.clientes', ['clientes'=> cliente::orderBy('id', 'desc')->paginate(20)]);
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
        $this->ob = '';
    }

    public function editar($id){
        $clientes = cliente::findOrFail($id);
        $this->id_cliente = $id;
        $this->nombre = $clientes->nombre_cliente;
        $this->direccion = $clientes->dirección_cliente;
        $this->telefono = $clientes->telefono_cliente;
        $this->fechNac = $clientes->fechaNac_cliente;
        $this->ob = $clientes->observaciones_cliente;
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
            'fechaNac_cliente'=> $this->fechNac,
            'observaciones_cliente'=>$this->ob
        ]);

        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
