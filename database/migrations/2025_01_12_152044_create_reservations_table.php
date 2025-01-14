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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('id_reservation');
            $table->unsignedBigInteger('id_client');
            $table->unsignedBigInteger('id_table');
            $table->dateTime('reservation_datetime')->nullable()->useCurrent(); 
            $table->enum('status', ['pending', 'confirmed', 'canceled'])->nullable()->default('pending');
            $table->foreign('id_client')->references('id_client')->on('clients')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_table')->references('id_table')->on('tables')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
