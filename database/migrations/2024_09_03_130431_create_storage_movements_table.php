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
        Schema::create('storage_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('storage_id')->constrained('storages')->onDelete('cascade');
            $table->integer('quantity');
            $table->enum('type', ['input', 'output']);
            $table->date('movement_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('storage_movements');
    }
};
