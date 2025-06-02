<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDocumentosTable extends Migration
{
    public function up()
    {
        Schema::table('documentos', function (Blueprint $table) {
            // Renomear colaborador_id para pessoa_id
            $table->renameColumn('colaborador_id', 'pessoa_id');

            // Adicionar regiao_id como chave estrangeira
            $table->unsignedBigInteger('regiao_id')->after('pessoa_id');

            // Relacionamento com tabela regioes
            $table->foreign('regiao_id')->references('id')->on('regioes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('documentos', function (Blueprint $table) {
            // Remover chave estrangeira e coluna regiao_id
            $table->dropForeign(['regiao_id']);
            $table->dropColumn('regiao_id');

            // Voltar o nome da coluna para colaborador_id
            $table->renameColumn('pessoa_id', 'colaborador_id');
        });
    }
}
