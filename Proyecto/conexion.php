<?php
function conexion() {
    $config = array(
        'servidor' => 'localhost:3310', 
        'usuarioBD' => 'root',
        'pwdBD' => '',
        'nomBD' => 'bd_web'
    );
    try {
        $conexion = new PDO("mysql:host={$config['servidor']};dbname={$config['nomBD']}", $config['usuarioBD'], $config['pwdBD']);

        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexion;

    } catch (PDOException $e) {
        die("Error de conexión: " . $e->getMessage());
    }
}
try{
    $bd=new PDO(
        'mysql:host=localhost:3310;
        dbname='.$nombase,
        $usuario,
        $pass,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
    );
} catch (PDOException $e) {
    die('Error: ' . $e->getMessage());
}
?>