<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoReceta extends Model
{
    use HasFactory;
    protected $fillable = [
        'cantidad',
        'receta_id',
        'ingredientes_id'
    ];

    

    public $timestamps = false;
    
    public function notabaja(){
        return $this->belongsTo(NotaBaja::class);
    }

    public function ingredientes(){
        return $this->belongsTo(Ingrediente::class);
    }
}
