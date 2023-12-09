<?php
$dir = dirname(__DIR__);

require_once $dir . '/vendor/autoload.php'; // Include the Composer autoloader
include_once $dir.'/classes/Register.php';
include_once $dir.'/classes/Product.php';
include_once $dir.'/classes/Employee.php';

use Bramus\Router\Router;

// Initialize Register class
$reg=new Register();

// Initialize Product class
$product=new Product();

//// Initialize Product class
$employee=new Employee();

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

$router->get('/add-product', function () {
    global $dir;
    require $dir."/views/add_product.php";
    exit;

});

$router->post('/add-product-data', function () {
    global $product;
    $product->addProduct($_POST,$_FILES);
    exit;

});

$router->get('/edit-product/(\d+)', function ($id1) {
    global $dir;
    require $dir."/views/edit_product.php";
    exit;

});

$router->post('/edit-product-data', function () {
    global $product;
    $product->editProduct($_POST,$_FILES);
    exit;

});

$router->get('/edit-profile/(\d+)', function ($id3) {
    global $dir;
    require $dir."/views/edit_profile.php";
    exit;

});

$router->post('/edit-profile-data', function () {
    global $employee;
    $employee->editProduct($_POST);
    exit;


});

$router->get('/delete/(\d+)', function ($id2) {
    global $product;
    $product-> deleteProduct($id2);
    exit;


});

$router->get('/logout', function () {
    global $reg;
    $reg->logout();
    exit;
});







// Run the router
$router->run();