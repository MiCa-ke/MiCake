<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\IngredienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NotaBajaController;
use App\Http\Controllers\DetalleBajaController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\DetallePedidoController;
use App\Http\Controllers\NotaCompraController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\ReporteController;


Route::get('/', function () {return view('auth.login');})->name('auth.login');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/create', [AdminController::class, 'store']);
Route::get('/admin/update', [AdminController::class, 'edit'])->name('admin.update');
Route::post('/admin/update', [AdminController::class, 'update']);

Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
Route::get('/empleado/create', [EmpleadoController::class, 'create'])->name('empleado.create');
Route::post('/empleado/create', [EmpleadoController::class, 'store']);
Route::get('/empleado/update', [EmpleadoController::class, 'edit'])->name('empleado.update');
Route::post('/empleado/update', [EmpleadoController::class, 'update']);

Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
Route::post('/cliente/create', [ClienteController::class, 'store']);
Route::get('/cliente/update', [ClienteController::class, 'edit'])->name('cliente.update');
Route::post('/cliente/update', [ClienteController::class, 'update']);
Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');

Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario.index');

Route::get('/medida', [MedidaController::class, 'index'])->name('medida.index');
Route::get('/medida/create', [MedidaController::class, 'create'])->name('medida.create');
Route::post('/medida/create', [MedidaController::class, 'store']);
Route::get('/medida/{id}', [MedidaController::class, 'edit'])->name('medida.update');
Route::post('/medida/update', [MedidaController::class, 'update']);

Route::get('/ingrediente', [IngredienteController::class, 'index'])->name('ingrediente.index');
Route::get('/ingrediente/create', [IngredienteController::class, 'create'])->name('ingrediente.create');
Route::post('/ingrediente/create', [IngredienteController::class, 'store']);
Route::get('/ingrediente/{id}', [IngredienteController::class, 'edit'])->name('ingrediente.update');
Route::post('/ingrediente/update', [IngredienteController::class, 'update']);

// Route::get('/receta', [RecetaController::class, 'index'])->name('receta.index');
// Route::get('/receta/create', [RecetaController::class, 'create'])->name('receta.create');
// Route::post('/receta/create', [RecetaController::class, 'store']);
// Route::get('/receta/update', [RecetaController::class, 'edit'])->name('receta.update');
// Route::post('/receta/update', [RecetaController::class, 'update']);
Route::resource('receta',RecetaController::class);

Route::post('IngredienteReceta',[RecetaController::class, 'storeIngredienteReceta'])->name('receta.storeIngredienteReceta');
Route::delete('IngredienteReceta/{id}',[RecetaController::class, 'destroyIngredienteReceta'])->name('receta.destroyIngredienteReceta');


Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
Route::post('/producto/create', [ProductoController::class, 'store']);
Route::get('/producto/editar/{id}', [ProductoController::class, 'edit'])->name('producto.update');
Route::put('producto/{id}',[ProductoController::class, 'update'])->name('producto.actualizar');
Route::delete('/producto/{id}', [ProductoController::class, 'destroy'])->name('producto.delete');


Route::get('/categoria', [CategoriaController::class, 'index'])->name('categoria.index');
Route::get('/categoria/create', [CategoriaController::class, 'create'])->name('categoria.create');
Route::post('/categoria/create', [CategoriaController::class, 'store']);
Route::get('/categoria/update', [CategoriaController::class, 'edit'])->name('categoria.update');
Route::post('/categoria/update', [CategoriaController::class, 'update']);
Route::delete('/categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria.delete');

//Nota Baja
Route::resource('notabaja', NotaBajaController::class);
Route::post('DetalleBaja', [DetalleBajaController::class,'store'])->name('DetalleBaja.store');
Route::delete('DetalleBaja/{id}', [DetalleBajaController::class,'destroy'])->name('DetalleBaja.delete');
//pedido
Route::resource('pedido',PedidoController::class);
Route::post('DetallePedido', [DetallePedidoController::class,'store'])->name('DetallePedido.store');
Route::delete('DetallePedido/{id}', [DetallePedidoController::class,'destroy'])->name('DetallePedido.delete');

Route::get('compra',[NotaCompraController::class,'index'])->name('compra.index');
Route::get('Detalle/{id}',[DetalleCompraController::class,'create'])->name('compraDetalle.create');
Route::post('Detalle',[DetalleCompraController::class,'store'])->name('compraDetalle.store');
Route::delete('Detalle/{id}',[DetalleCompraController::class,'destroy'])->name('compraDetalle.destroy');
Route::post('compra',[NotaCompraController::class,'store'])->name('compra.store');
Route::get('compra/{id}',[NotaCompraController::class,'show'])->name('compra.show');
Route::delete('compra/{id}',[NotaCompraController::class,'destroy'])->name('compra.delete');

Route::get('Reporte/Compras',[ReporteController::class,'reporteCompras'])->name('reporteCompras');
Route::get('Reporte/Pedidos',[ReporteController::class,'reportePedido'])->name('reportePedido');
Route::get('Bitacora',[ReporteController::class,'bitacora'])->name('Bitacora');