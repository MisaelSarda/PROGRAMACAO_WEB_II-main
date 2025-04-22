<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('Empresas', function (Blueprint $table) {
            $table->id();
            $table->string('Nome');
            $table->string('CNPJ')->unique();
            $table->string('e-mail')->nullable();
            $table->string('telefone')->nullable();
            $table->string('endereço')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empresas');
    }
};
