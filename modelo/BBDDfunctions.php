<?php
include './conectarBBDD/conexionBBDD.php';

// Consulta y retorna datos desde la base de datos (SELECT)
function selectFunction($query) {
    $mysqli = conectarBBDD();
    $resultado = mysqli_query($mysqli, $query);
    $data = array();
    while ($row = mysqli_fetch_assoc($resultado)) {
        $data[] = $row;
    }

    desconectarBBDD($mysqli);
    return $data;
}

// Inserta datos en la base de datos (INSERT)
function insertFunction($query){
    $mysqli=conectarBBDD();
    mysqli_query($mysqli,$query);
    desconectarBBDD($mysqli);
}

// Actualiza datos en la base de datos (UPDATE)
function updateFunction($query){
    $mysqli=conectarBBDD();
    mysqli_query($mysqli,$query);
    desconectarBBDD($mysqli);
}

?>