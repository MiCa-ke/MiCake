<?php

namespace Database\Seeders;

use App\Models\Medida;
use App\Models\Receta;
use App\Models\Ingrediente;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MedidaSeeder extends Seeder
{
  public function run()
  {
    $gramo = Medida::create(['name' => 'gramos']);
    $litro = Medida::create(['name' => 'litros']);
    $mililitro = Medida::create(['name' => 'mililitros']);
    $unidad = Medida::create(['name' => 'unidades']);
    $onza = Medida::create(['name' => 'onzas']);

    $harina = Ingrediente::create(['name' => 'harina', 'precio' => '10.5','stock' => '10000', 'medida_id' => $gramo->id]);
    $azucar = Ingrediente::create(['name' => 'azucar', 'precio' => '10.5','stock' => '10000', 'medida_id' => $gramo->id]);
    $azucarImp = Ingrediente::create(['name' => 'azucar impalpable', 'precio' => '10.5','stock' => '3000', 'medida_id' => $gramo->id]);
    $polvoHornear = Ingrediente::create(['name' => 'polvo de hornear', 'precio' => '10.5','stock' => '1000', 'medida_id' => $gramo->id]);
    $cocoa = Ingrediente::create(['name' => 'cocoa en polvo', 'precio' => '10.5','stock' => '1000', 'medida_id' => $gramo->id]);
    $mantequilla = Ingrediente::create(['name' => 'mantequilla', 'precio' => '10.5','stock' => '1000', 'medida_id' => $gramo->id]);
    $huevo = Ingrediente::create(['name' => 'huevo', 'precio' => '10.5','stock' => '100', 'medida_id' => $unidad->id]);
    $leche = Ingrediente::create(['name' => 'leche', 'precio' => '10.5','stock' => '10', 'medida_id' => $litro->id]);
    $vainilla = Ingrediente::create(['name' => 'vainilla', 'precio' => '10.5','stock' => '100', 'medida_id' => $mililitro->id]);

    $masa = Receta::create(['descripcion' => 'Masa Blanca 10p']);
    $masa->ingredientes()->attach($harina->id, ['cantidad' => '200']);
    $masa->ingredientes()->attach($azucar->id, ['cantidad' => '200']);
    $masa->ingredientes()->attach($mantequilla->id, ['cantidad' => '200']);
    $masa->ingredientes()->attach($huevo->id, ['cantidad' => '3']);

    $masa2 = Receta::create(['descripcion' => 'Masa Chocolate 10p']);
    $masa2->ingredientes()->attach($harina->id, ['cantidad' => '200']);
    $masa2->ingredientes()->attach($azucar->id, ['cantidad' => '200']);
    $masa2->ingredientes()->attach($mantequilla->id, ['cantidad' => '200']);
    $masa2->ingredientes()->attach($cocoa->id, ['cantidad' => '200']);
    $masa2->ingredientes()->attach($huevo->id, ['cantidad' => '3']);
  }
}
