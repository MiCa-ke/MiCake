<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->double('importe');
            $table->unsignedBigInteger('pedidos_id');
            $table->unsignedBigInteger('productos_id');
            $table->foreign('pedidos_id')->on('pedidos')->references('id');
            $table->foreign('productos_id')->on('productos')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
