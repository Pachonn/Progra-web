<?php
include("conexion.php");

session_start();
$_SESSION['inicio'] = false;
$conn = conexion();
$email = $_POST["email"] ?? NULL;
$pass = $_POST['password'] ?? NULL;

$sql = "SELECT Nom_Usuario,correo, rol, pwd FROM usuarios WHERE correo = :correo AND pwd = :pwd";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':correo', $email);
$stmt->bindParam(':pwd', $pass);
$stmt->execute();
$infoUsuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($infoUsuario) {
    $_SESSION['inicio'] = true;
    $_SESSION['correo'] = $infoUsuario['correo'];
    $_SESSION['pwd'] = $infoUsuario['pwd'];
    $_SESSION['rol'] = $infoUsuario['rol'];
    $_SESSION['Nom_Usuario'] = $infoUsuario['Nom_Usuario'];

    if ($infoUsuario["rol"] == "Cliente") {
        $_SESSION['mensaje'] = "Bienvenido, Cliente $email";
        header("Location: cliente.php");
    } else if ($infoUsuario["rol"] == "Administrador") {
        $_SESSION['mensaje'] = "Bienvenido, Administrador $email";
        header("Location: admin.php");
    } else {
        header("Location: index.php?id=error");
    }
} else {
    $_SESSION['mensaje'] = "Error en las credenciales";
    header("Location: index.php?id=error");
    exit();
}

// Cierra la conexión a la base de datos
$conn = null;
?>