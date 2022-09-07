<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fornecedor = [
            "nome" => "Sarah jay",
            "site" => "sarinha.com",
            "uf" => "SC",
            "email" => "sarinha@mail.com",
        ];

        Fornecedor::create($fornecedor);

        DB::table("fornecedores")->insert([
            "nome" => "Kendra Lust",
            "site" => "kendrinha.com",
            "uf" => "RS",
            "email" => "Kendra@mail.com",
        ]);
    }
}
