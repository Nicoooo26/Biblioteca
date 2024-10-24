<?php

include './config/parametrosBBDD.php';

// Función para conectar a la base de datos
function conectarBBDD() {

    global $host, $usuarioBD, $passwordBD, $nombreBD;

    // Establece la conexión con la base de datos utilizando los parámetros
    $mysqli = mysqli_connect($host, $usuarioBD, $passwordBD, $nombreBD);

    // Verifica si hay errores al conectar
    if (mysqli_connect_errno()) {
        echo "Fallo al conectar a MySQL: " . mysqli_connect_error();
    }

    // Establece el juego de caracteres para la conexión a utf8mb4
    $mysqli->set_charset("utf8mb4");

    return $mysqli;
}

// Función para desconectar de la base de datos
function desconectarBBDD($mysqli){
    mysqli_close($mysqli);
}
?>

