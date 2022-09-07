<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siteContato extends Model
{
    protected $table = "site_contatos";

    protected $fillable = ["nome", "telefone", "email", "motivo_contatos_id", "mensagem"];
}
