<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'estado',
        'estado_pago',
        'fecha_entrega',
        'fecha_pedido',
        'total',
        'user_id'
    ];

    

    public $timestamps = false;
    public function usuario(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function detallepedido(){
        return $this->hasMany(DetallePedido::class,'pedidos_id','id');
    }
}
