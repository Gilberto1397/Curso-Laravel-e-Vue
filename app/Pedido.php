<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = "pedidos";

    public function produtos(){
        return $this->belongsToMany("App\Produto", "pedidos_produtos", "pedido_id", "produto_id");
    }
}
