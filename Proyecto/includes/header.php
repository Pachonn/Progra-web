<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
        
    <link rel="stylesheet" href="/resources/css/estilos.css" />
</head>

<body>

    <div class="jumbotron" >
        <div class="container" >
        
            <h1 class="display-3">
            <img src="/resources/img/periodicaso.jpg" width="130px" height="130px">
            No hay mayor libertad para decidir <br>
            </h1>
            
            <p class="p_nav">Que estar bien informado</p>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item item-nav">
                        <a class="nav-link text-dark" aria-current="page" href="/index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active item-nav text-dark" href="#Nosotros">Nosotros</a>
                    </li>
                </ul>

                <form class="d-flex">
                    <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        type="button">
                        Iniciar Sesión
                    </button>


                </form>
            </div>
        </div>
    </nav>


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-login">
            <div class="modal-content modal-login">
                <div class="modal-header">
                    <h5 class="modal-title" aria-hidden="true" id="staticBackdropLabel">Iniciar Sesión</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center">
                        <img src="/resources/img/login-image.jpg" alt="160px" height="160px" />
                    </div>


                    <form action="/validform.php" method="POST" class="d-flex flex-column"
                        id="form-Login">
                        <div class="mb-4">
                            <div>
                                <label for="email" class="form-label"> Email</label>
                                <input type="email" required class="form-control" name="email" id="email" value=""
                                    placeholder="ejemplo@gmail.com" />

                                <div class="valid-feedback"><br>
                                    Formato de correo válido
                                </div>

                                <div class="invalid-feedback"><br>
                                    Formato de correo inválido
                                </div>


                            </div>
                            <div class="mb-4">

                                <div>

                                    <label for="password" class="form-label"> <br> Contraseña <br></label>
                                    <input type="password" required class="form-control" name="password" id="password"
                                        placeholder="Ingresar contraseña" />
                                    <div class="valid-feedback"><br>
                                        La contraseña cumple con las especificaciones requeridas
                                    </div>

                                    <div class="invalid-feedback"><br>
                                        La contraseña debe contener mínimo 8 caracteres y máximo 15,
                                        al menos una letra mayúscula, al menos una letra minúscula,
                                        al menos un dígito, no debe haber espacios en blanco y al menos 1 caracter
                                        especial.
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>
</html>