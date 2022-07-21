<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
 
    public function ingredientes()
    {
        return $this->hasMany('App\Models\Ingrediente');
    }
}
