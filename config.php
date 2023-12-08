<?php
$root=dirname(__FILE__);
require_once $root.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable($root);
$dotenv->safeLoad();


$host=$_ENV['SERVER_URL'];

define("SERVER",$_ENV['DB_HOST']);
define("USER", $_ENV['DB_USERNAME']);
define("PASSWORD",$_ENV['DB_PASSWORD']);
define("DATABASE",$_ENV['DB_DATABASE']);