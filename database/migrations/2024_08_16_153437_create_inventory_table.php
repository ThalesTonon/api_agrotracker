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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id(); // ID do item no estoque
            $table->string('name'); // Nome do item
            $table->integer('quantity'); // Quantidade em estoque
            $table->decimal('price', 15, 2); // Preço do item
            $table->date('expiration_date')->nullable(); // Data de validade, se aplicável
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Chave estrangeira para users
            $table->timestamps(); // Campos created_at e updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
