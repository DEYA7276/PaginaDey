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
        Schema::create('tables', function (Blueprint $table) {
            $table->id('id_table');  // Esto asegura que el campo 'id_table' sea la clave primaria
            $table->string('table_number');
            $table->integer('capacity');
            $table->string('location');
            $table->unsignedBigInteger('id_staff');
            $table->foreign('id_staff')->references('id_staff')->on('staff')->onDelete('cascade');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
