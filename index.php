<?php
error_reporting(E_ALL);
ini_set("display_errors",1);
// charge l'autoload de composer
require "vendor/autoload.php";

// charge le contenu du .env dans $_ENV
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$router = new Router();

$router->handleRequest($_GET);