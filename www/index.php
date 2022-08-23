<?php
session_start();

//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";

$root = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'www' . DIRECTORY_SEPARATOR;

define("CONTROLLER_PATH", $root . 'controllers' . DIRECTORY_SEPARATOR);
define("SEED_WORK_PATH", $root . 'seedwork' . DIRECTORY_SEPARATOR);
define("SERVICE_PATH", $root . 'services' . DIRECTORY_SEPARATOR);

define("DATA_PATH", $root . '..' . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR);
define("IMAGE_PATH", $root . 'images' . DIRECTORY_SEPARATOR);
define("VIEW_PATH", $root . 'views' . DIRECTORY_SEPARATOR);
if (php_sapi_name() === "fpm-fcgi") {
    define("STATIC_FILE_PATH", "");
} else {
    define("STATIC_FILE_PATH", 'views' . DIRECTORY_SEPARATOR);
}

const LOGIN_URL = "/login";
const REGISTER_URL = "/register";

const CUSTOMER_ROLE = "customer";
const VENDOR_ROLE = "vendor";
const SHIPPER_ROLE = "shipper";
const NONE_ROLE = "none";

require_once SEED_WORK_PATH . "Router.php";
require_once CONTROLLER_PATH . "CustomerController.php";
require_once CONTROLLER_PATH . "VendorController.php";
require_once CONTROLLER_PATH . "ShipperController.php";
require_once CONTROLLER_PATH . "LoginController.php";
require_once CONTROLLER_PATH . "RegisterController.php";
require_once CONTROLLER_PATH . "ProfileController.php";
require_once CONTROLLER_PATH . "ProductController.php";
require_once CONTROLLER_PATH . "ErrorController.php";

use Controllers\CustomerController;
use Controllers\ErrorController;
use Controllers\LoginController;
use Controllers\ProductController;
use Controllers\ProfileController;
use Controllers\RegisterController;
use Controllers\ShipperController;
use Controllers\VendorController;
use SeedWork\Exceptions\RouteNotFoundException;
use SeedWork\Router;

$router = new Router();
$router
    ->get("/", [CustomerController::class, "index"], CUSTOMER_ROLE)
    ->get("/", [VendorController::class, "index"], VENDOR_ROLE)
    ->get("/", [ShipperController::class, "index"], SHIPPER_ROLE)
    ->get("/profile", [ProfileController::class, "index"])
    ->post("/profile", [ProfileController::class, "update"])
    // login
    ->get(LOGIN_URL, [LoginController::class, "index"])
    ->post(LOGIN_URL, [LoginController::class, "login"])
    ->get("/logout", [LoginController::class, "logout"])
    // register
    ->get(REGISTER_URL, [RegisterController::class, "index"])
    ->get(REGISTER_URL . "-detail", [RegisterController::class, "detail"])
    ->post(REGISTER_URL, [RegisterController::class, "register"])
    // product
    ->get("/product-detail", [ProductController::class, "detail"])
    ->get("/product-add", [ProductController::class, "productForm"], VENDOR_ROLE)
    ->get("/product-edit", [ProductController::class, "productForm"], VENDOR_ROLE)
    ->post("/product", [ProductController::class, "submit"], VENDOR_ROLE)
    // error
    ->get("/404", [ErrorController::class, "notfound"])
    ->get("/500", [ErrorController::class, "internalError"])
    ->allowForwardStaticFile();

try {
    echo $router->resolve(strtolower($_SERVER['REQUEST_METHOD']), $_SERVER['REQUEST_URI']);
} catch (RouteNotFoundException $e) {
    http_response_code(404);
    header("Location: /404");
}

set_exception_handler(function (\Throwable $e) {
    http_response_code(500);
    header("Location: /500");
});