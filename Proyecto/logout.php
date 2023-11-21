<?php

// Cerrar sesión
session_destroy();

// Redirigir a la página index
header("Location: index.php");
exit();
?>