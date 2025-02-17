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
        Schema::create('staff', function (Blueprint $table) {
            $table->id('id_staff');
            $table->string('name', 100)->nullable()->default('Employee');
            $table->string('role', 50)->nullable()->default('Role');
            $table->string('phone', 15)->nullable();
            $table->string('photo',100)->nullable()->default('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
