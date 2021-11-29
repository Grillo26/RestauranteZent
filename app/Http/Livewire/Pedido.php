<?php

namespace App\Http\Livewire;

use App\Models\cliente;
use App\Models\mesa;
use App\Models\pedido as ModelsPedido;
use App\Models\personal;
use Livewire\Component;
use Livewire\WithPagination;

class Pedido extends Component
{
    use WithPagination;
    public $cliente, $tipo, $mesa, $personal, $fecha, $id_pedido;
    public $modal = false;

    public function render()
    {
        return view('livewire.pedido', [
            'clientes'=>cliente::get(),
            'mesas'=>mesa::get(),
            'personals'=>personal::get(),
            'pedidos' => ModelsPedido::orderBy('id','desc')->paginate(20)
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
        $this->cliente ='';
        $this->tipo = '';
        $this->mesa = '';
        $this->personal = '';
        $this->fecha = '';
    }
    public function editar($id){
        $pedido = ModelsPedido::findOrFail($id);
        $this->id_pedido =$id;
        $this->cliente = $pedido->id_cliente;
        $this->tipo = $pedido->tipo_pedido;
        $this->mesa = $pedido->id_mesa;
        $this->personal = $pedido->id_personal;
        $this->fecha = $pedido->fecha_pedido;
        $this->abrirModal();
    }
    public function borrar($id){
        ModelsPedido::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');

    }
    public function guardar(){
        ModelsPedido::updateOrCreate(['id'=>$this->id_pedido],[
            'id_cliente'=>$this->cliente,
            'tipo_pedido'=>$this->tipo,
            'id_mesa'=>$this->mesa,
            'id_personal'=>$this->personal,
            'fecha_pedido' => $this->fecha
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }
}
