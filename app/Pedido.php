<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";

    public function produtos(){
        return $this->belongsToMany("App\Produto", "pedidos_produtos", "pedido_id", "produto_id")->withPivot("id", "created_at", "updated_at", "quantidade");
    }

    public function cliente(){
        return $this->belongsTo("App\Cliente", "cliente_id", "id");
    }
}
