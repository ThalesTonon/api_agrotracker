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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id(); // ID do equipamento
            $table->string('name'); // Nome do equipamento
            $table->text('description')->nullable(); // Descrição do equipamento
            $table->date('acquisition_date')->nullable(); // Data de aquisição do equipamento
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para users
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
