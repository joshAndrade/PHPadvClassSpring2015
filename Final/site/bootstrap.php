<?php

function load_lib($base) {
    $baseName = explode('\\', $base);
    $class = end($baseName);
    
    include 'lib/'. $class . '.php';
};
spl_autoload_register('load_lib');

session_start();
session_regenerate_id(TRUE);

$dbConfig = array(
           "DB_DNS"=>'mysql:host=localhost;port=3306;dbname=PHPadvClassSpring2015',
           "DB_USER"=>'root',
           "DB_PASSWORD"=>''
);

if ( null !== filter_input(INPUT_GET, 'logout') ) {
    session_destroy();
    header("Location: Login.php");
    die();
}