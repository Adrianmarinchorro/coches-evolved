<?php

namespace  App\database;

use Medoo\Medoo;
use Symfony\Component\VarDumper\VarDumper;


class conector{


    function __invoke(): Medoo
    {
        return new Medoo([
            'type' => 'mysql',
            'host' => 'db',
            'database' => 'db',
            'username' => 'db',
            'password' => 'db'
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