<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'subtotal',
        'descripcion',
        'nota_compras_id',
        'ingredientes_id'
    ];

    
    public $timestamps = false;

    public function notacompra(){
        return $this->belongsTo(NotaCompra::class,'nota_compras_id','id');
    }

    public function ingredientes(){
        return $this->belongsTo(Ingrediente::class);
    }
}
