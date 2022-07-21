<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'importe',
        'pedidos_id',
        'productos_id'
    ];

    
    public $timestamps = false;

    public function pedido(){
        return $this->belongsTo(Pedido::class,'pedidos_id','id');
    }

    public function producto(){
        return $this->belongsTo(Producto::class,'productos_id','id');
    }
}
