<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaCompra extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha',
        'total',
        'user_id'
    ];

    
    public $timestamps = false;

    public function detallecompra(){
        return $this->hasMany(DetalleCompra::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
