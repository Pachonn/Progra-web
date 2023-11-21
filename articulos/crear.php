<?php
$servidor="localhost";
$username="root";
$pwBD="";
$nomBD="bda";
$bd=mysqli_connect($servidor,$username,$pwBD,$nomBD);

$nombre="";
$desc="";
$autor="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre=$_POST["nombre"];
    $desc=$_POST["desc"];   
    $autor=$_POST["autor"];

    do{
        if(empty($nombre)||empty($desc)||empty($autor)){
            $errorMessage="Llene todos los Campos";
            break;
        }

        //Agregar
        $sql="INSERT INTO ARTICULOS (NOMBRE, DESCRIPCION, AUTOR)".
            "VALUES ('$nombre','$desc','$autor')";
        $resul=$bd->query($sql);
        if(!$resul){
            $errorMessage="Dato invalido: ".$bd->error;
            break;
        }

        $nombre="";
        $desc="";
        $autor="";
        
        $successMessage="¡Registro Exitoso!";

        include_once('admin2.php');
        exit;

    }while(false);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Registro</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container my-5">
    <h1 style="text-align: center;">Registro Articulo</h1>

    <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert alert-warning'>
            <strong>¡Atencion!</strong> $errorMessage
            </div>
            ";
        }
        ?>

    <form method="post">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Titulo: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descripcion </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="desc" value="<?php echo $desc; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Autor: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="autor" value="<?php echo $autor; ?>">
                </div>
            </div>

            <?php
            if(!empty($successMessage)){
                echo "
                <div class='alert alert-success'>
                <strong>$successMessage</strong>
                </div>
                ";
            }
            ?>
            <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </div>
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="admin2.php" role="button">Cancelar<a>
                </div>
            </div>
    </form>
    </div>
</body>
</html>