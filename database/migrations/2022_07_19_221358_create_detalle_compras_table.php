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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->double('subtotal');
            $table->string('descripcion');
            $table->unsignedBigInteger('nota_compras_id');
            $table->unsignedBigInteger('ingredientes_id');
            $table->foreign('nota_compras_id')->on('nota_compras')->references('id');
            $table->foreign('ingredientes_id')->on('ingredientes')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detalle_compras');
    }
};
