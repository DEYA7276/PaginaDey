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
            $table->id('id_table');
            $table->integer('table_number')->nullable()->default(1);
            $table->integer('capacity')->nullable()->default(4);
            $table->string('location', 50)->nullable()->default('Location');
            $table->unsignedBigInteger('id_staff')->nullable();
            $table->foreign('id_staff')->references('id_staff')->on('staff')->onDelete('set null');
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
