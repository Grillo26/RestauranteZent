<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proveedor extends Model
{
    use HasFactory;

    protected $fillable=['nombre_proveedor','direccion_proveedor','telefono_proveedor','email'];

     //Relacion uno a muchos
     public function proveedorInsumos(){
        return $this->hasMany('App\Models\proveedor_insumo');

    }
}
