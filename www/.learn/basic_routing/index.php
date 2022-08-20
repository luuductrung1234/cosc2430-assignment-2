<?php

// Predefined Variables (e.g. $_GET, $_POST,...) - https://www.php.net/manual/en/reserved.variables.php
// Superglobals (e.g. $_SERVER,...) - https://www.php.net/manual/en/language.variables.superglobals.php
// Session - https://www.php.net/manual/en/refs.basic.session.php
// Network (e.g. header, cookie,...) - https://www.php.net/manual/en/book.network.php
// Output Buffering Control - https://www.php.net/manual/en/book.outcontrol.php
// PHP Streaming and Output Buffering Explained - https://www.sitepoint.com/php-streaming-output-buffering-explained/

session_start();

//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR;

define("APP_PATH", $root . 'basic_routing' . DIRECTORY_SEPARATOR);
define("CONTROLLER_PATH", $root . 'basic_routing' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR);
define("STORAGE_PATH", $root . 'basic_routing' . DIRECTORY_SEPARATOR . 'storage');

require_once APP_PATH . "Router.php";
require_once CONTROLLER_PATH . "Home.php";
require_once CONTROLLER_PATH . "Invoice.php";

$router = new \App\Router();

$router->get('/.learn/basic_routing/index.php', [\App\Classes\Home::class, "index"]);
$router->post('/upload', [\App\Classes\Home::class, "upload"]);
$router->get('/invoices', [\App\Classes\Invoice::class, "index"]);
$router->get('/invoices/create', [\App\Classes\Invoice::class, "create"]);
$router->post('/invoices/create', [\App\Classes\Invoice::class, "store"]);

try {
    echo $router->resolve(strtolower($_SERVER['REQUEST_METHOD']), $_SERVER['REQUEST_URI']);
} catch (App\Exceptions\RouteNotFoundException $e) {
    echo $e->getMessage() . ' ' . $e->getFile() . ': ' . $e->getLine() . PHP_EOL;
}

set_exception_handler(function (\Throwable $e) {
    echo $e->getMessage() . ' ' . $e->getFile() . ': ' . $e->getLine() . PHP_EOL;
});

var_dump($_SESSION);
var_dump($_COOKIE);
