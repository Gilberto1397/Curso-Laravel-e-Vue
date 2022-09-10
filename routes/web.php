<?php

use App\Http\Middleware\LogAcessoMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/principal', "PrincipalController@principal")->name("site.principal");

Route::get('/principal-param/{n1?}/{n2?}', "PrincipalController@PrincipalParam")->name("principal-param");

Route::get('/sobrenos', "SobreNosController@sobrenos")->name("site.sobrenos");

Route::get('/contato', "ContatoController@contato")->name("site.contato");

Route::post('/contato', "ContatoController@salvar")->name("site.contato.save");

Route::get('/login/{erro?}', "LoginController@index")->name("site.login");

Route::post('/login', "LoginController@autenticar")->name("site.login");

Route::prefix("/app")->name("app.")->middleware("autenticacao")->group(function() {
    Route::get('/home', "HomeController@index")->name("home");

    Route::get('/sair', "LoginController@sair")->name("sair");

    Route::get('/fornecedor', "FornecedorController@index")->name("fornecedor");
    Route::post('/fornecedor/listar', "FornecedorController@listar")->name("fornecedor.listar");
    Route::get('/fornecedor/listar', "FornecedorController@listar")->name("fornecedor.listar");
    Route::get('/fornecedor/adicionar', "FornecedorController@adicionar")->name("fornecedor.adicionar");
    Route::post('/fornecedor/adicionar', "FornecedorController@adicionar")->name("fornecedor.adicionar");
    Route::get('/fornecedor/editar/{id}/{msg?}', "FornecedorController@editar")->name("fornecedor.editar");
    Route::get('/fornecedor/excluir/{id}/', "FornecedorController@excluir")->name("fornecedor.excluir");

    //produtos
    Route::resource("produto", "ProdutoController");

    //produtos detalhes
    Route::resource("produto-detalhe", "ProdutoDetalheController");

    Route::resource("cliente", "ClienteController");
    Route::resource("pedido", "PedidoController");
    //Route::resource("pedido-produto", "PedidoProdutoController");
    Route::get("pedido-produto/create/{pedido}", "PedidoProdutoController@create")->name("pedido-produto.create");
    Route::post("pedido-produto/store/{pedido}", "PedidoProdutoController@store")->name("pedido-produto.store");
    Route::delete("pedido-produto/destroy/{pedidoProduto}/{pedido_id}", "PedidoProdutoController@destroy")->name("pedido-produto.destroy");
});

//TODO Erro ao criar novo cliente

Route::fallback(function(){
    return 'A rota acessada não existe. <a href="'.route('site.principal').'">clique aqui</a> para ir para página inicial';
});
