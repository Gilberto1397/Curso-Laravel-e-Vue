<?php

use App\siteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* $site_contato = [
            "nome" => "Sarah jay",
            "telefone" => "99523",
            "email" => "sarinha@mail.com",
            "motivo_contato" => "1",
            "mensagem" => "Olá, testando save"
        ];

        siteContato::create($site_contato); */

        factory(SiteContato::class, 100)->create();
    }
}
