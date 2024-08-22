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
        Schema::table('users', function (Blueprint $table) {
            // Adiciona a coluna company_id e configura a chave estrangeira
            $table->foreignId('company_id')->constrained('company')->onDelete('cascade');

            // Adiciona a coluna role com um valor padrão de 'Colaborador'
            $table->enum('role', ['Super', 'Admin', 'Colaborador'])->default('Colaborador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
            $table->dropColumn('role');
        });
    }
};
