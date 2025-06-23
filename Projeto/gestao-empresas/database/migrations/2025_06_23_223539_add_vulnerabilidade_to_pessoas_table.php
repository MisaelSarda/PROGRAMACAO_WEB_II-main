<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::table('pessoas', function (Blueprint $table) {
        $table->text('vulnerabilidade')->nullable()->after('telefone');
    });
}

public function down()
{
    Schema::table('pessoas', function (Blueprint $table) {
        $table->dropColumn('vulnerabilidade');
    });
}

};
