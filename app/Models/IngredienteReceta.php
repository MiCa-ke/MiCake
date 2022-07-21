<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredienteReceta extends Model
{
    use HasFactory;

    protected $table = 'ingrediente_receta';
    protected $fillable = [
        'cantidad',
        'receta_id',
        'ingrediente_id'
    ];

    

    public $timestamps = false;
    
    public function receta(){
        return $this->belongsTo(Receta::class);
    }

    public function ingredientes(){
        return $this->belongsTo(Ingrediente::class,'ingrediente_id','id');
    }
}
