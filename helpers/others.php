<?php
include './modelo/consultasBBDD.php'; 

// Función para redirigir según la ruta proporcionada
function redireccionar($ruta, $idLibro, $paginaActual) {
    if ($ruta === "cuerpo") {
        // Redirecciona a la página principal con la paginación actual
        header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=$paginaActual");
    } elseif ($ruta === "mislibros") {
        // Redirecciona a la página de "Mis Libros" con la paginación actual
        header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=mislibros&pagina=$paginaActual");
    } else {
        // Redirecciona a la información detallada de un libro específico con la primera página
        header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=infoLibro&id=$idLibro&pagina=1");
    }
    // Finaliza el script
    exit;
}

// Función para obtener datos de libros según la ruta
function obtenerDatosLibrosSegunRuta($librosPorPagina, $idUsuario, $paginaActual) {
    if (isset($_GET['ruta']) && $_GET['ruta'] == "cuerpo") {
        // Obtener libros para la página principal
        return obtenerLibrosCuerpo($librosPorPagina, $paginaActual);
    } elseif (isset($_GET['ruta']) && $_GET['ruta'] == "mislibros") {
        // Obtener libros pertenecientes al usuario
        return obtenerMisLibros($librosPorPagina, $idUsuario, $paginaActual);
    } elseif (isset($_GET['ruta']) && $_GET['ruta'] == "librosPrestados") {
        // Obtener libros prestados
        return obtenerLibrosPrestados($librosPorPagina, $paginaActual);
    } elseif (!isset($_GET['ruta'])) {
        // Redireccionar a la página principal si no se especifica una ruta
        header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=cuerpo");
        exit;
    }
}

// Función para redirigir según la ruta proporcionada
function redirectSegunRuta($idLibro, $paginaActual) {
    if ($_GET['ruta'] === 'cuerpo') {
        // Redireccionar a la página principal con la paginación actual
        header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=" . $paginaActual);
    } else {
        // Redireccionar a la información detallada de un libro específico con la primera página
        header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=infoLibro&id=" . $idLibro . "&pagina=1");
    }
    // Finaliza el script
    exit;
}
?>