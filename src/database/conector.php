<?php

namespace  App\database;

use Medoo\Medoo;
use Symfony\Component\VarDumper\VarDumper;


class conector{


    function __invoke(): Medoo
    {
        return new Medoo([
            'type' => 'mysql',
            'host' => $_SERVER['DB_HOST'], //$_SERVER[], $_ENV[] y getenv() ( esta ultima no es segura y las dos primeras son variables globales de php)
            'database' => $_ENV['DB_NAME'],
            'username' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASS'],
        ]);
    }

}




//dd($db->get('coche')); // dump and die (hace el exit)
/*
$data = array(
    'marca' => 'pe342',
    'modelo' => '2008',
    'color' => 'negro',
    'matricula' => '1241PPL'
);

$db->insert('coche', $data);

if ($db->id())
    dd($db->id());
*/