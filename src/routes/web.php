<?php

namespace App\routes;

// paquetes symfony routing
use App\controller\CocheController;
use App\controller\UsuarioController;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;

$routes = new RouteCollection();

// rutas en orden ( primero aquellas que no tengan parametros, es decir de menos informacion a mas)
$routes->add('coche_listar', new Route('/', ['_controller' =>  [new CocheController, 'index']]));
$routes->add('usuario_listar', new Route('/usuarios', ['_controller' => [new UsuarioController, 'index']]));
$routes->add('coche_crear', new Route(
    path: '/coches/create',
    defaults: ['_controller' => [new CocheController, 'create']],
    methods: 'GET'
)); // la misma ruta metodo de GET y de POST.
$routes->add('coche_insert', new Route(
    path: '/coches/create',
    defaults: ['_controller' => [new CocheController, 'insert']],
    methods: 'POST'
));
$routes->add('usuario_crear', new Route(
    path: '/usuarios/create',
    defaults: ['_controller' => [new UsuarioController, 'create']],
    methods: 'GET'
)); // la misma ruta metodo de GET y de POST.
$routes->add('usuario_insert', new Route(
    path: '/usuarios/create',
    defaults: ['_controller' => [new UsuarioController, 'insert']],
    methods: 'POST'
));
$routes->add('coche_ver', new Route('/coches/{id}', ['_controller' => [new CocheController, 'show']]));
$routes->add('usuario_ver', new Route('/usuarios/{id}', ['_controller' => [new UsuarioController, 'show']]));
$routes->add('coche_modify', new Route('/coches/modify/{id}', ['_controller' => [new CocheController, 'modify']]));
$routes->add('usuario_modify', new Route('/usuarios/modify/{id}', ['_controller' => [new UsuarioController, 'modify']]));
$routes->add('coche_borrar', new Route('/coches/delete/{id}', ['_controller' => [new CocheController, 'delete']]));
$routes->add('usuario_borrar', new Route('/usuarios/delete/{id}', ['_controller' => [new UsuarioController, 'delete']]));

return $routes;