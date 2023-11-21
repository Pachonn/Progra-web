<?php
if (!isset($_POST['oculto'])) {
    exit();
}

include 'conexionPDO.php';
$apellidoPater = $_POST['apellidoPaterno'];
$apellidoMater = $_POST['apellidoMaterno'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$passw = $_POST['passw'];
$rol = $_POST['rol'];

$sentencia = $bd->prepare("INSERT INTO usuarios(apelli_paterno,apelli_materno,nombre,correo,pass,rol) VALUES (?,?,?,?,?,?);");
$resultado = $sentencia->execute([$apellidoPater, $apellidoMater,$nombre, $correo, $passw, $rol]);

if ($resultado === TRUE) {
    //echo "se inserto";
    header('Location: controlUsusarios.php');
} else {
    echo "error";
}
