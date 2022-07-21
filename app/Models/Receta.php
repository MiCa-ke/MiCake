<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion'
    ];

    public function ingredientes()
    {
        return $this->belongsToMany('App\Models\Ingrediente')->withPivot('cantidad');
    }
    public function productos()
    {
        return $this->belongsToMany('App\Models\Producto')->withPivot('cantidad');
    }
}
