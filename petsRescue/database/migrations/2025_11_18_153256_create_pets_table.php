<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecuta las migraciones.
     */
    public function up(): void
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();

            // Campos de dominio básicos (sin relaciones todavía)
            $table->string('name', 120);
            $table->string('species', 50); // e.g., dog, cat, rabbit...
            $table->unsignedTinyInteger('age')->nullable(); // años aproximados
            $table->enum('status', ['available', 'pending', 'adopted'])->default('available');
            $table->text('description')->nullable();

            // Relaciones (foreign keys opcionales)
            $table->foreignId('created_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete(); // si se borra el usuario, se pone a NULL

            $table->foreignId('adopted_by')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Revierte las migraciones.
     */
    public function down(): void
    {
        Schema::dropIfExists('pets');
    }
};
