<?php
$servidor="localhost";
$username="root";
$pwBD="";
$nomBD="bda";

$bd=mysqli_connect($servidor,$username,$pwBD,$nomBD);

$id="";
$nombre="";
$descr="";
$autor="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["id"])){
        include("admin2.php");
        exit;
    }

    $id=$_GET["id"];

    $sql="SELECT * FROM articulos WHERE ID_ARTICULO=$id";
    $result=$bd->query($sql);
    $row=$result->fetch_assoc();

    if(!$row){
        include("admin2.php");
        exit;
    }

    $id=$row["ID_ARTICULO"];
    $nombre=$row["NOMBRE"];
    $descr=$row["DESCRIPCION"]    ;
    $autor=$row["AUTOR"];

}else{
    $id=$_POST["id"];
    $nombre=$_POST["nombre"];
    $descr=$_POST["descr"];
    $autor=$_POST["autor"];

    do{
        if(empty($id)||empty($nombre)||empty($descr)||empty($autor)){
            $errorMessage="Llene todos los Campos";
            break;
        }
        $sql="UPDATE ARTICULOS SET NOMBRE='$nombre', DESCRIPCION='$descr', AUTOR='$autor' WHERE ID_ARTICULO='$id'";

        $result=$bd->query($sql);

        if(!$result){
            $errorMessage="Dato Invalido: ".$bd->error;
            break;
        }

        $successMessage="¡Actualización Exitosa!";

        include_once('admin2.php');
        exit;

    }while(false);//or true
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

    <title>Editar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<header class="bg-dark text-white">
    <div class="jumbotron"
        style=" background-image: url('IMG/fondolegal.jpg'); background-size: cover; position: relative; width: 100%;">
        <div style="margin-left: 100px;" class="d-flex align-items-center">
            <div class="ms-5">
                <h1 class="display-4">Actualizacion de Articulos</h1>
            </div>
        </div>
    </div>
</header>
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
        <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Titulo: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
                </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Descripcion: </label>
                <div class="col-sm-6">
                    <input type="file" class="form-control" name="descr" value="<?php echo $descr; ?>">
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