<?php

namespace App\Http\Livewire;

use App\Models\proveedor as ModelsProveedor;
use Livewire\Component;
use Livewire\WithPagination;

class Proveedor extends Component
{
    use WithPagination;
    public $proveedor, $nombre, $direccion, $telefono, $email, $id_proveedor;
    public $modal= false;

    public function render()
    {
        return view('livewire.proveedor', ['proveedors'=> ModelsProveedor::orderBy('id', 'desc')->paginate(20)]);
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
        $this->telefono ='';
        $this->email='';
    }

    public function editar($id){
        $proveedor = Modelsproveedor::findOrFail($id);
        $this->id_proveedor = $id;
        $this->nombre = $proveedor->nombre_proveedor;
        $this->direccion = $proveedor->direccion_proveedor;
        $this->telefono = $proveedor->telefono_proveedor;
        $this->email = $proveedor->email;
        $this->abrirModal();
    }

    public function borrar($id){
        Modelsproveedor::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar(){
        Modelsproveedor::updateOrCreate(['id'=>$this->id_proveedor],
    [
        'nombre_proveedor' => $this->nombre,
        'direccion_proveedor' => $this->direccion,
        'telefono_proveedor' => $this->telefono,
        'email' => $this->email
    ]);
    $this->cerrarModal();
    $this->limpiarCampos();
    }
}