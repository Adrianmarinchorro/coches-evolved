<?php

namespace App\routes;

// paquetes symfony routing
use App\controller\CocheController;
use Symfony\Component\Routing\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;


$routeIndex = new Route('/', ['_controller' => [new CocheController, 'index']]);
$routeCoches = new Route('/Coche/{id}', ['_controller' => [new CocheController, 'verCoche']]);
$routeBorrarCoches = new Route('/borrarcoche/{id}', ['_controller' => [new CocheController, 'deleteCoche']]);
$routeCrearCoche = new Route('/'); // la misma ruta metodo de GET y de POST.

$routes = new RouteCollection();

$routes->add('coche_ver', $routeCoches, -10);
$routes->add('coche_borrar', $routeBorrarCoches);
$routes->add('coche_listar', $routeIndex);

$context = new RequestContext();
$context->fromRequest(Request::createFromGlobals());

// Routing can match routes with incoming requests
$matcher = new UrlMatcher($routes, $context);

//dump($matcher);
$parameters = $matcher->match($context->getPathInfo());

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