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
        Schema::create('compras', function (Blueprint $table) {
            $table->id('idCompra');
            $table->decimal('importe');
            $table->integer('unidades');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('idProveedor')->nullable();
            $table->foreign('idProveedor')
                ->references('idProveedor')
                ->on('proveedores')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('idInventario')->nullable();
            $table->foreign('idInventario')
                ->references('idInventario')
                ->on('inventario')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
