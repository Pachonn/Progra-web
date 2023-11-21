<?php
function conexion() {
    $config = array(
        'servidor' => 'localhost:3310', // Puede ser una dirección IP o un nombre de dominio
        'usuarioBD' => 'root',
        'pwdBD' => '',
        'nomBD' => 'bd_web'
    );

    try {
        // Crear una conexión
        $conexion = new PDO("mysql:host={$config['servidor']};dbname={$config['nomBD']}", $config['usuarioBD'], $config['pwdBD']);

        // Establecer el modo de error para lanzar excepciones en lugar de mostrar advertencias
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conexion;

    } catch (PDOException $e) {
        // Manejo de errores
        die("Error de conexión: " . $e->getMessage());
    }
}

// Ejemplo de uso
try {
    // Llamar a la función para obtener la conexión
    $conexion = conexion();

    // Ahora puedes utilizar $conexion para realizar consultas u otras operaciones en la base de datos
    // ...

} catch (PDOException $e) {
    // Manejo de errores
    die("Error: " . $e->getMessage());
} finally {
    // Cerrar la conexión cuando hayas terminado
    if ($conexion) {
        $conexion = null;
    }
}
?>