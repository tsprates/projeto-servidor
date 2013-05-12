<?php
// BANCO DE DADOS
// ============================
// autor: Thiago Silva
// date: 08/05/2013

// databases config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'projeto_monografia');

// connect
$db = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST, DB_USER, DB_PASS);
