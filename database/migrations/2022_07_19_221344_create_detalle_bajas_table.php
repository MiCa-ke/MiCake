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
        Schema::create('detalle_bajas', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');
            $table->unsignedBigInteger('nota_bajas_id');
            $table->unsignedBigInteger('ingredientes_id');
            $table->foreign('nota_bajas_id')->on('nota_bajas')->references('id');
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
        Schema::dropIfExists('detalle_bajas');
    }
};
