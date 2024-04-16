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
        Schema::create('tareas', function (Blueprint $table) {
            $table->id('idTarea');
            $table->string('nombre');
            $table->dateTime('fecha');
            $table->text('descripcion');
            $table->enum('estado', ['pendiente', 'hecho']);
            $table->unsignedBigInteger('idEmpleado');
            $table->foreign('idEmpleado')
                ->references('idEmpleado')
                ->on('empleados')
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
        Schema::dropIfExists('tareas');
    }
};
