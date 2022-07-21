<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotaBaja extends Model
{
    use HasFactory;
    
    public $timestamps = false;

    protected $fillable = [
        'fecha',
        'total',
        'user_id'
    ];

    

    public function detallebajas(){
        return $this->hasMany(DetalleBaja::class);
    }

    public function usuario(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
