<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger("motivo_contatos_id");
        });

        //Puxando os dados de motivo_contato para motivo_contatos_id
        //DB::statement("update site_contatos set motivo_contatos_id = motivo_contato");

        //Criando a FK
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign("motivo_contatos_id")->references("id")->on("motivo_contatos");
        });

        //Removendo a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn("motivo_contato");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //adicionando a coluna novamente
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer("motivo_contato");
        });

        //Desfazendo relacionamento
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropForeign("site_contatos_motivo_contatos_id_foreign");
        });

        //Recopiando os dados da tabela
        DB::statement("update site_contatos set motivo_contato = motivo_contatos_id");

        //Dropando a tabela
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn("motivo_contatos_id");
        });
    }
}
