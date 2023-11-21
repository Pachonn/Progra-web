<!DOCTYPE html>
<html lang="en">
<head>
  <title>Main</title>
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
                <h1 class="display-4">Articulos</h1>
            </div>
        </div>
    </div>
</header>
  
<div class="container">
  <marquee><h4 style="text-align: center;">Administrador 2</h4></marquee>
  <a class="btn btn-primary" href="crear.php" role="button" style="background-color: green;">Agregar Articulo</a>
  <br>
   <table class="table table-bordered table-hover">
      <thead>
         <tr>
            <th>Id</th>
            <th>Titulo Articulo</th>
            <th>Descripcion</th>
            <th>Autor</th>
         </tr>
      </thead>
      <tbody>
         <?php
         $servidorBD = "localhost";
         $usuarioBD = "root";
         $pwdBD = "";
         $nomBD = "bda";

         $conBD = mysqli_connect($servidorBD, $usuarioBD, $pwdBD, $nomBD);
         if($conBD->connect_error){
            die("Conexión fallida: ".$conBD->connect_error);
         }

         $sql = "SELECT * FROM ARTICULOS";
         $res = $conBD->query($sql);
         if(!$res){
            die("Consulta fallida: ".$conBD->connect_error);
         }

         while ($row = $res->fetch_assoc()) {   
            echo "
            <tr>
            <td>$row[ID_ARTICULO]</td>
            <td>$row[NOMBRE]</td>
            <td>$row[DESCRIPCION]</td>
            <td>$$row[AUTOR]</td>
            <td>
               <a class='btn btn-primary btn-sm' href='editar.php?id=$row[ID_ARTICULO]'>Editar Articulo</a>
               <a class='btn btn-danger btn-sm' href='borrar.php?id=$row[ID_ARTICULO]'>Eliminar Articulo</a>
            </td>
            </tr>
               ";
            }
         ?>
         
      </tbody>
   </table>
</div>