<?php
//basic database setup and configuration
error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

require dirname(__DIR__) . '/vendor/autoload.php';

//load the dotenv file in to get the variables
$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Using Medoo namespace.
use Medoo\Medoo;
$database = new Medoo([
    // All the fields needed to make a connection with the database.
    'type' => $_ENV['DB_DRIVER'],
    'host' => $_ENV['DB_SERVER'],
    'database' => $_ENV['DB_NAME'],
    'username' => $_ENV['DB_USER'],
    'password' => $_ENV['DB_PASSWORD']
]);
?>