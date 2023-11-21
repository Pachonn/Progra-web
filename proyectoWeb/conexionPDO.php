<?php
$pass = '';
$usuario = 'root';
$nombase = 'progra_web';


try {
    $bd = new PDO(
        'mysql:host=localhost;
        dbname=' . $nombase,
        $usuario,
        $pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}
