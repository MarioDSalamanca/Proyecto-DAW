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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id('idVenta');
            $table->decimal('importe');
            $table->dateTime('fecha');
            $table->unsignedBigInteger('idCliente')->nullable();
            $table->foreign('idCliente')
                ->references('idCliente')
                ->on('clientes')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('idEmpleado')->nullable();
            $table->foreign('idEmpleado')
                ->references('idEmpleado')
                ->on('empleados')
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
        Schema::dropIfExists('ventas');
    }
};
