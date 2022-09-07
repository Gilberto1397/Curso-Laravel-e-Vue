<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\siteContato;
use Faker\Generator as Faker;

$factory->define(SiteContato::class, function (Faker $faker) {
    return [
        "nome" =>  $faker->name,
        "telefone" => $faker->tollFreePhoneNumber,
        "email" => $faker->unique()->email, //email n se repete
        "motivo_contatos_id" => $faker->numberBetween(1,3),
        "mensagem" => $faker->text(200)
    ];
});
