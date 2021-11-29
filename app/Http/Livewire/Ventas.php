<?php

namespace App\Http\Livewire;

use App\Models\pedido;
use App\Models\venta;
use Livewire\Component;
use Livewire\WithPagination;

class Ventas extends Component
{
    use WithPagination;
    public $id_venta, $doc, $tipo_doc, $sub_to, $iva, $propina, $total, $fecha, $id_pedido;
    public $modal = false;
    public function render()
    {
        return view('livewire.ventas',[
            'pedidos'=>pedido::get(),
            'ventas'=> venta::orderBy('id','desc')->paginate(20)
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
        $this->doc ='';
        $this->tipo_doc = '';
        $this->sub_to = '';
        $this->iva = '';
        $this->propina = '';
        $this->total = '';
        $this->fecha = '';
        $this->id_pedido = '';
    }
    public function editar($id){
        $pedido = venta::findOrFail($id);
        $this->id_venta = $id;
        $this->doc = $pedido->nro_doc;
        $this->tipo_doc =$pedido->tipo_doc;
        $this->sub_to =$pedido->sub_totla;
        $this->iva =$pedido->iva;
        $this->propina =$pedido->propina;
        $this->total =$pedido->total;
        $this->fecha =$pedido->fecha_pedido;
        $this->id_pedido =$pedido->id_pedido;
        
        $this->abrirModal();
    }
    public function borrar($id){
        venta::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');

    }
    public function guardar(){
        venta::updateOrCreate(['id'=>$this->id_venta],[
            'nro_doc'=>$this->doc,
            'tipo_doc'=>$this->tipo_doc,
            'sub_totla'=>$this->sub_to,
            'iva'=>$this->iva,
            'propina'=>$this->propina,
            'total'=>$this->total,
            'fecha_pedido'=>$this->fecha,
            'id_pedido'=>$this->id_pedido
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }

}
