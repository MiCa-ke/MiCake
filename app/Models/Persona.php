<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

protected $fillable = [
    'ci',
    'direccion',
    'telefono',
    'user_id'
];

public function user(){
    return $this->belongsTo(User::class);
}


}
