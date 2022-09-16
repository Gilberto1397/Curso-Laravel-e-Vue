<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesPedidosProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 50);
            $table->timestamps();
        });

        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("cliente_id");
            $table->timestamps();

            $table->foreign("cliente_id")->references("id")->on("clientes")->onDelete("cascade")->onUpdate("cascade");
        });

        Schema::create('pedidos_produtos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pedido_id");
            $table->unsignedBigInteger("produto_id");
            $table->timestamps();

            $table->foreign("pedido_id")->references("id")->on("pedidos")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("produto_id")->references("id")->on("produtos")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Para evitar erros na exclusão das FK elas são desabilitadas e após a exclusão, habilitadas
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('clientes');
        Schema::dropIfExists('pedidos');
        Schema::dropIfExists('pedidos_produtos');
        Schema::enableForeignKeyConstraints();
    }
}
