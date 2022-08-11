<?php

namespace App\routes;

// paquetes symfony routing
use App\controller\CocheController;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGenerator;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;

$routes = new RouteCollection();

// rutas en orden ( primero aquellas que no tengan parametros, es decir de menos informacion a mas)
$routes->add('coche_listar', new Route('/', ['_controller' => [new CocheController, 'index']]));
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
$routes->add('coche_ver', new Route('/coches/{id}', ['_controller' => [new CocheController, 'show']]));
$routes->add('coche_modify', new Route('/coches/modify/{id}', ['_controller' => [new CocheController, 'modify']]));
$routes->add('coche_borrar', new Route('/coches/delete/{id}', ['_controller' => [new CocheController, 'delete']]));

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

// Routing can match routes with incoming requests
$matcher = new UrlMatcher($routes, $context);

//dump($matcher);
$parameters = $matcher->match($context->getPathInfo());

//$urlGenerator = new UrlGenerator($routes, $context);



//dump($parameters);

//dump($_SERVER);

$controllerClass = $parameters['_controller'][0];
$controllerAction = $parameters['_controller'][1];
$id = isset($parameters['id']) ? $parameters['id'] : '';

$controller = new $controllerClass();

call_user_func_array([$controller, $controllerAction],[$id]);



//$response->setContent($param);

// $parameters = [
//     '_controller' => 'App\Controller\BlogController',
//     'slug' => 'lorem-ipsum',
//     '_route' => 'blog_show'
// ]