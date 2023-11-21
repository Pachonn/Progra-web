<?php
//print_r($_POST);
if (!isset($_POST['oculto'])) {
    header('Location: controlUsusarios.php');
}

include 'conexionPDO.php';
$apellidoPaterno1 =$_POST['apellidoPaterno1'];
$apellidoMaterno1 = $_POST['apellidoMaterno1'];
$nombre1 = $_POST['nombre1'];
$correo1 = $_POST['correo1'];
$passw1 = $_POST['passw1'];
$rol1 = $_POST['rol1'];
$id_usuario = $_POST['id_usuario'];

$sentencia = $bd->prepare("UPDATE usuarios SET apelli_paterno = ?,apelli_materno = ?,nombre =?,correo = ?,pass = ?,rol =? WHERE id_usuario=?;");
$resultado = $sentencia->execute([$apellidoPaterno1, $apellidoMaterno1, $nombre1, $correo1, $passw1, $rol1,$id_usuario]);


if ($resultado === TRUE) {

    header('Location: controlUsusarios.php');
} else {
    echo "error";
}
