<?php
//print_r($_GET);
if (!isset($_GET['id_usuario'])) {
    header('Location: controlUsusarios.php');
}
$id_usuario = $_GET['id_usuario'];
include 'conexionPDO.php';
$sentencia =$bd->prepare("DELETE FROM usuarios WHERE id_usuario=?;");
$resultado = $sentencia->execute([$id_usuario]);

if ($resultado === TRUE) {

    header('Location: controlUsusarios.php');
} else {
    echo "error";
}

?>