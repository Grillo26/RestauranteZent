<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mesa extends Model
{
    use HasFactory;
    protected $fillable = ['id','CantMaxComensales','Ubicacion'];
    //Relacion uno a muchos
    public function pedidos(){
        return $this->hasMany('App\Models\pedido');
    }
}
