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
        Schema::create('financial_records', function (Blueprint $table) {
            $table->id(); // ID da transação financeira
            $table->string('type'); // Tipo: Receita ou Despesa
            $table->decimal('amount', 15, 2); // Valor da transação
            $table->text('description')->nullable(); // Descrição da transação
            $table->date('date'); // Data da transação
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para users
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_records');
    }
};
