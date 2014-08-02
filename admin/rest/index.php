<?php

require '../FastRoute/bootstrap.php';
require '../../api/api.php';
//Load our route class loader
spl_autoload_register(function($class) {
    if (strpos($class, 'RestAPI\\') === 0) {
        $name = substr($class, strlen('RestAPI'));
        require __DIR__ . "/controllers/" . strtr($name, '\\', DIRECTORY_SEPARATOR) . '.php';
    }
});

define("REST_BASE",substr($_SERVER["REQUEST_URI"], 0, strpos($_SERVER["REQUEST_URI"], "rest")) . "rest/");
$dispatcher = FastRoute\cachedDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', REST_BASE . 'overview', 'RestAPI\\Overview');
    //$r->addRoute('GET', '/webstat/admin/rest/user/{name}', 'handler2');
}, [
'cacheFile' => __DIR__ . '/route.cache', /* required */
'cacheDisabled' => false,     /* optional, enabled by default */
]);

$routeInfo = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],$_SERVER['REQUEST_URI']);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
    http_response_code(404);
    die();
    break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
    $allowedMethods = $routeInfo[1];
    http_response_code(405);
    die();
    break;
    case FastRoute\Dispatcher::FOUND:
    try{
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        $ctl = new $handler();
        echo json_encode($ctl->respond($routeInfo[2]));
        die();
    }catch(Exception $ex){
        http_response_code(500);
        die(json_encode(array("error"=>$e->getMessage())));
    }
    break;
}