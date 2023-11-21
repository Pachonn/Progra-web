
<!DOCTYPE html>
<html lang="es">

   
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>CLiente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
            crossorigin="anonymous" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

        <link rel="stylesheet" href="/resources/css/estilos.css" />
        <head>
 
        <?php
session_start();

// Verifica si el usuario está autenticado
if ($_SESSION['inicio']) {
    $nombreUsuario = $_SESSION['Nom_Usuario'];
    $rolUsuario = $_SESSION['rol'];

    // Utiliza $nombreUsuario y $rolUsuario según sea necesario en tu página bienvenida.php

    // Muestra el mensaje almacenado en la variable de sesión
    if (isset($_SESSION['mensaje'])) {
        echo "<script>alert('{$_SESSION['mensaje']}');</script>";
        unset($_SESSION['mensaje']); // Limpia la variable de sesión después de mostrar el mensaje
    }
} else {
    // Si el usuario no está autenticado, redirige a la página de inicio
    header("Location: index.php");
    exit();
}
?>

<script>
function logout() {
    document.getElementById("logoutForm").submit();
}
</script>

    </head>

    <body>

    <div class="jumbotron" >
        <div class="container" >
        
            <h1 class="display-1">
            <img src="/resources/img/periodicaso.jpg" width="130px" height="130px">
            No hay mayor libertad para decidir <br>
            </h1>
            
            <p class="p_nav">Que estar bien informado</p>
        </div>
    </div>



        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <div class="container-fluid">
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item item-nav">
                        <a class="nav-link text-dark" aria-current="page" href="/cliente.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active item-nav text-dark" href="#Nosotros">Nosotros</a>
                    </li>
                </ul>
                <div>
                <details>
                    <br>
                    <summary>
                        <img src="/resources/img/login-image.jpg" width="40px" height="40px">
                        <?php echo "$rolUsuario: $nombreUsuario"; ?>
                    </summary>
                    <ul>
                    <form id="logoutForm" action="logout.php" method="post" class="d-flex">
                     <a href="#" class="btn btn-danger" type="button" onclick="logout()">Cerrar Sesión</a>
                    </form>
                    </li>
                    </ul>
                </details>
                </div>
               
                
                </div>
            </div>
            
        </nav>
        <table class="tabla_Articulos" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre del articulo</th>
                <th>Articulo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Articulo de Peces</td>
                <td> <iframe src="/resources/articulos/Guia_identificacion_peces.pdf" height="400" width="600" title="Ejemplo iframe"></iframe></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Articulo de Animales/td>
                <td> <iframe src="/resources/articulos/Animales-Ecosistemas.pdf" height="400" width="600" title="Ejemplo iframe"></iframe></td>
            </tr>
        </tbody>
    </table>

          

    </body>

    </html>