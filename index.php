<?php

require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Matcher\UrlMatcher;


$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

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

$request = Request::createFromGlobals();
$routes = include __DIR__ . '/src/routes/web.php';

$context = new RequestContext();
$context->fromRequest($request);

// Routing can match routes with incoming requests
$matcher = new UrlMatcher($routes, $context);

//dump($matcher);
//$parameters = $matcher->match($context->getPathInfo());

//$urlGenerator = new UrlGenerator($routes, $context);



//dump($parameters);

//dump($_SERVER);

//$controllerClass = $parameters['_controller'][0];
//$controllerAction = $parameters['_controller'][1];
//$id = isset($parameters['id']) ? $parameters['id'] : '';

//$controller = new $controllerClass();


$controllerResolver = new ControllerResolver();
$argumentResolver = new ArgumentResolver();

try{


$request->attributes->add($matcher->match($request->getPathInfo())); // va a buscar la ruta

$controller = $controllerResolver->getController($request);
$arguments = $argumentResolver->getArguments($request, $controller);


call_user_func_array($controller, $arguments);
} catch (ResourceNotFoundException){
    echo 'Esta página no existe, se redireccionará.';

    header('refresh:3;url=/');
    
}catch(Exception $e){
    echo sprintf('Error:  %s', $e);
};