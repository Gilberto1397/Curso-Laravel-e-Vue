<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Criando a coluna em produtos que vai receber a fk de fornecedores
        Schema::table('produtos', function (Blueprint $table) {

            //Insere um registro de fornecedor para o relacionamento
            $fornecedor = DB::table('fornecedores')->insertGetId([
                "nome" => "Fornecedor Padrão",
                "site" => "fornecedorpadrao.com.br",
                "uf" => "SP",
                "email" => "contato@fornecedor@mail.com",
            ]);

            $table->unsignedBigInteger("fornecedor_id")->default($fornecedor)->after("id");
            $table->foreign("fornecedor_id")->references("id")->on("fornecedores");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign("produto_fornecedor_id_foreign");
            $table->dropColumn("fornecedor_id");
        });
    }
}
