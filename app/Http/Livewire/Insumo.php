<?php

namespace App\Http\Livewire;

use App\Models\insumo as ModelsInsumo;
use Livewire\Component;
use Livewire\WithPagination;

class Insumo extends Component
{
    public $nombre, $cantidad, $medida, $id_insumo;
    public $modal = false;
    use WithPagination;
    public function render()
    {
        return view('livewire.insumo',['insumos'=> ModelsInsumo::orderBy('id','desc')->paginate(20)]);
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
        $this->cantidad = '';
        $this->medida = '';

    }

    public function editar($id){
        $insumo = ModelsInsumo::findOrFail($id);
        $this->id_insumo = $id;
        $this->nombre = $insumo->nombre_insumo;
        $this->cantidad = $insumo->cantidad_insumo;
        $this->medida = $insumo->unidadMedida_insumo;
        $this->abrirModal();
    }

    public function borrar($id){
        ModelsInsumo::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar(){
        ModelsInsumo::updateOrCreate(['id'=>$this->id_insumo],
        [
            'nombre_insumo' => $this->nombre,
            'cantidad_insumo' => $this->cantidad,
            'unidadMedida_insumo' => $this->medida
        ]);

        $this->cerrarModal();
        $this->limpiarCampos();
    }


}
