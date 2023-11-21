<?php
include 'conexionPDO.php';
$sentencia = $bd->query("SELECT * FROM USUARIOS;");
$usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
//print_r($usuarios);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crontrol Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/c24e95e941.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <h1 class="text-center">Control de Usuarios</h1>
    <div class="container-fluid row">
        <form class="col-2 p-3" method="post" action="registarUsuarios.php">
            <fieldset>
                <legend class="text-center">Registrar Usuario</legend>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce el apellido paterno</label>
                    <input type="text" name="apellidoPaterno" class="form-control" placeholder="Apellido Paterno">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce el apellido materno</label>
                    <input type="text" name="apellidoMaterno" class="form-control" placeholder="Apellido Materno">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce el nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Nombre">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce el correo</label>
                    <input type="text" name="correo" class="form-control" placeholder="Correo">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Introduce la contraseña</label>
                    <input type="text" name="passw" class="form-control" placeholder="Contraseña">
                </div>
                <div class="mb-3">
                    <label for="disabledSelect" class="form-label">Selecciona el rol</label>
                    <select id="disabledSelect" class="form-select" name="rol">
                        <option>Cliente</option>
                        <option>Administrador</option>
                    </select>
                </div>
                <input type="hidden" name="oculto" value="1">
                <button type="submit" class="btn btn-primary" name="btnRegistrar" value="ok">Registrar</button>
            </fieldset>
        </form>

        <div class="col-10 p-5">
            <table class="table table-hover">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">id Usuario</th>
                        <th scope="col">Apellido Paterno</th>
                        <th scope="col">Apellido Materno</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Contraseña</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($usuarios as $fila) :
                    ?>
                        <tr>
                            <td><?php echo $fila->id_usuario ?></td>
                            <td><?php echo $fila->apelli_paterno ?></td>
                            <td><?php echo $fila->apelli_materno ?></td>
                            <td><?php echo $fila->nombre ?></td>
                            <td><?php echo $fila->correo ?></td>
                            <td><?php echo $fila->pass ?></td>
                            <td><?php echo $fila->rol ?></td>
                            <td>
                                <a href="editarUsuarios.php?id_usuario=<?php echo $fila->id_usuario; ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="eliminarUsuarios.php?id_usuario=<?php echo $fila->id_usuario; ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>