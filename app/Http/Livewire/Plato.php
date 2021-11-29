<?php

namespace App\Http\Livewire;

use App\Models\plato as ModelsPlato;
use App\Models\personal;
use Illuminate\Database\Events\ModelsPruned;
use Livewire\Component;
use Livewire\WithPagination;

class Plato extends Component
{
    use WithPagination;
    public $precio, $tipo, $descripcion, $personal, $id_plato;
    public $modal = false;

    public function render()
    {
        return view('livewire.plato',[
            'personals' => personal::get(),
            'platos'=>ModelsPlato::orderby('id','desc')->paginate(20)
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
        $this->precio ='';
        $this->tipo = '';
        $this->descripcion = '';
        $this->personal = '';
    }

    public function editar($id){
        $plato = ModelsPlato::findOrFail($id);
        $this->id_plato = $id;
        $this->precio = $plato->precio_plato;
        $this->tipo = $plato->tipo_plato;
        $this->descripcion = $plato->descripcion_plato;
        $this->personal = $plato->id_personal;
        $this->abrirModal();
    }

    public function borrar($id){
        ModelsPlato::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar(){
        ModelsPlato::updateOrCreate(['id'=>$this->id_plato],[
            'precio_plato'=>$this->precio,
            'tipo_plato'=>$this->tipo,
            'descripcion'=>$this->descripcion,
            'id_personal'=>$this->personal
        ]);
        $this->cerrarModal();
        $this->limpiarCampos();
    }

}
