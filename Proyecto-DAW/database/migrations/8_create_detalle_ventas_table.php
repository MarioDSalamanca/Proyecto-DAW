<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('idDetalleVenta');
            $table->integer('unidades');
            $table->unsignedBigInteger('idInventario')->nullable();
            $table->foreign('idInventario')
                ->references('idInventario')
                ->on('inventario')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('idVenta');
            $table->foreign('idVenta')
                ->references('idVenta')
                ->on('ventas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};
