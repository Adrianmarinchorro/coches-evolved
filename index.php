<?php

require __DIR__ . '/vendor/autoload.php';
require './src/routes/web.php';

use App\controller\CocheController;
use App\routes\web;


//$controller = new CocheController;

/*
$array_rutas = array_filter(explode("/", $_SERVER["REQUEST_URI"]));

if(isset($array_rutas[1]) && $array_rutas[1] == "Coche" && is_numeric($array_rutas[2])){

    $controller->verCoche($array_rutas[2]);

} elseif(isset($array_rutas[1]) && $array_rutas[1] == "borrarcoche" && is_numeric($array_rutas[2])){

    $controller->deleteCoche($array_rutas[2]);

} else {
    $controller->index();
}
*/