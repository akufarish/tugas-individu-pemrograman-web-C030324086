<?php
require_once ('C:/kuliah/web/tugas-individu/vendor/autoload.php');
// /c/kuliah/web/tugas-individu

$dotenv = Dotenv\Dotenv::createImmutable("../../");
$dotenv->load();

$HOST = $_ENV["DB_HOST"];
$DATABASE = $_ENV["DB_DATABASE"];
$USERNAME = $_ENV["DB_USERNAME"];
$PASSWORD = $_ENV["DB_PASSWORD"];

ORM::configure("mysql:host=$HOST;dbname=$DATABASE");
ORM::configure('username', $USERNAME);
ORM::configure('password', $PASSWORD);

ORM::configure('logging', true);