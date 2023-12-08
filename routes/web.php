<?php
$dir = dirname(__DIR__);

require_once $dir . '/vendor/autoload.php'; // Include the Composer autoloader
include_once $dir.'/classes/Register.php';

use Bramus\Router\Router;

// Initialize Register class

$reg=new Register();

// Initialize the router
$router = new Router();
$router->setBasePath('/');
// Define routes
$router->get('/', function () {
    require "index.php";
    exit;
});
$router->post('/login-data', function () {
    global $reg;
    $reg->login($_POST);
    exit;
});
$router->get('/signup', function () {
    global $dir;
    require $dir."/views/signup.php";
    exit;

});

$router->post('/signup-data', function () {
    global $reg;
    $reg->signup($_POST);
    exit;

});
$router->get('/home', function () {
    global $dir;
    require $dir."/views/home.php";
    exit;

});



// Run the router
$router->run();