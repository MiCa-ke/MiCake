<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bitacora extends Model
{
    use HasFactory;

    protected $fillable = [
        'Descripcion',
        'Tipo',
        'fecha',
        'user_id'
    ];
    
    public $timestamps = false;
    
    public function usuario(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
