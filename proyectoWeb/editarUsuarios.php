<?php
if (!isset($_GET['id_usuario'])) {
    header('Location: controlUsusarios.php');
}
include 'conexionPDO.php';
$id_usuario = $_GET['id_usuario'];

$sentencia = $bd->prepare("SELECT * FROM USUARIOS WHERE id_usuario=?;");
$resultado = $sentencia->execute([$id_usuario]);
$persona = $sentencia->fetch(PDO::FETCH_OBJ);
//print_r($persona);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c24e95e941.js" crossorigin="anonymous"></script>
</head>

<body>
<?php
include 'header.php';
?>
    <h1 class="text-center">Control de Usuarios</h1>
    <div class="d-flex justify-content-center " style="height: 100vh;">
        <form class="col-6 p-3" method="post" action="editarProceso.php">
            <fieldset>
                <legend class="text-center">Editar Usuario</legend>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce el apellido paterno</label>
                    <input type="text" name="apellidoPaterno1" class="form-control" value="<?php echo $persona->apelli_paterno ?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce el apellido materno</label>
                    <input type="text" name="apellidoMaterno1" class="form-control" value="<?php echo $persona->apelli_materno ?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce el nombre</label>
                    <input type="text" name="nombre1" class="form-control" value="<?php echo $persona->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce el correo</label>
                    <input type="text" name="correo1" class="form-control" value="<?php echo $persona->correo ?>">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce la contraseña</label>
                    <input type="text" name="passw1" class="form-control" value="<?php echo $persona->pass ?>">
                </div>
                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Selecciona el rol</label>
                    <select id="disabledSelect" class="form-select" name="rol1">
                        <option <?php echo ($persona->rol == 'Administrador') ? 'selected' : ''; ?>>Administrador</option>
                        <option <?php echo ($persona->rol == 'Cliente') ? 'selected' : ''; ?>>Cliente</option>
                    </select>
                </div>
                <input type="hidden" name="oculto" value="1">
                <input type="hidden" name="id_usuario" value="<?php echo $persona->id_usuario ?>">
                <button type="submit" class="btn btn-primary" name="btnConfirmar" value="ok">Confirmar</button>
            </fieldset>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>