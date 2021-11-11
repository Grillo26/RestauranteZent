<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;

    protected $fillable=['nombre_cliente','dirección_cliente','telefono_cliente','fechaNac_cliente'.'observaciones_cliente'];
    //relacion uno a muchos
    public function pedidos(){
        return $this->hasMany('App\Models\pedido');
    }
}
