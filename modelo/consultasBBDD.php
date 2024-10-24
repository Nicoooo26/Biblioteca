<?php
include 'BBDDfunctions.php';

// Verificar las credenciales del usuario en la base de datos
function iniciarSesion($usuario, $password) {
    $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = selectFunction($query);

    if (!empty($resultado)) {
        $userData = $resultado[0];
        $contrasenaAlmacenada = $userData['contrasena'];

        // Comprobar si la contraseña ingresada coincide con la almacenada
        if (password_verify($password, $contrasenaAlmacenada)) {
            $tipoUsuario = $userData['tipo'];
            $idUsuario = $userData['id'];

            // Establecer información de sesión para el usuario autenticado
            $_SESSION["usuario"] = $usuario;
            $_SESSION["id_usuario"] = $idUsuario;
            $_SESSION["rol"] = ($tipoUsuario == "admin") ? "administrador" : "estandar";
            return true; // Inicio de sesión exitoso
        }
    }

    return false; // Inicio de sesión fallido
}

 // Verificar si el usuario ya existe en la base de datos
function verificarUsuarioExistente($usuario) {
    $query = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $result = selectFunction($query);
    $existeUsuario = count($result) > 0;
    return $existeUsuario;
}

// Agregar un nuevo usuario a la base de datos con la contraseña encriptada
function agregarNuevoUsuario($nombre, $apellidos, $email, $usuario, $contrasena, $pais) {
    $contraseniahaseada = password_hash($contrasena, PASSWORD_BCRYPT);
    $query = "INSERT INTO usuarios (nombre, apellidos, usuario, contrasena, email, pais) VALUES ('$nombre', '$apellidos','$usuario', '$contraseniahaseada', '$email', '$pais')";
    insertFunction($query);
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

// Obtener información del usuario desde la base de datos
function obtenerDatosUsuario($idUsuario) {
    $query = "SELECT nombre, apellidos, email, pais, tipo FROM usuarios WHERE id = $idUsuario";
    $resultado = selectFunction($query);
    return $resultado[0];
}

// Función para obtener los libros para la sección "cuerpo"
function obtenerLibrosCuerpo($librosPorPagina,$paginaActual) {
    $comienzo = ($paginaActual - 1) * $librosPorPagina;
    $queryLibro = "SELECT * FROM libros WHERE borrado=false LIMIT $comienzo, $librosPorPagina";
    return selectFunction($queryLibro);
}

// Función para obtener los libros para la sección "mislibros"
function obtenerMisLibros($librosPorPagina, $idUsuario,$paginaActual) {
    $comienzo = ($paginaActual - 1) * $librosPorPagina;
    $queryLibro = "SELECT l.id, l.ISBN, l.titulo, p.fecha_inicio, p.fecha_fin, l.prestado FROM libros l 
                    INNER JOIN prestamos p ON l.id = p.id_libro 
                    WHERE p.borrado=false AND l.prestado = true AND p.id_usuario = $idUsuario 
                    LIMIT $comienzo, $librosPorPagina";
    return selectFunction($queryLibro);
}

// Función para obtener los libros para la sección "librosPrestados"
function obtenerLibrosPrestados($librosPorPagina,$paginaActual) {
    $comienzo = ($paginaActual - 1) * $librosPorPagina;
    $queryLibro = "SELECT libros.ISBN, prestamos.fecha_fin, usuarios.id AS id_usuario, usuarios.usuario, prestamos.fecha_inicio
                    FROM libros
                    INNER JOIN prestamos ON libros.id = prestamos.id_libro
                    INNER JOIN usuarios ON prestamos.id_usuario = usuarios.id
                    WHERE prestamos.borrado=false AND libros.prestado = true 
                    LIMIT $comienzo, $librosPorPagina";
    return selectFunction($queryLibro);
}

//Calcular el número de páginas dependiendo de la ruta.
function calcularTotalPaginas($librosPorPagina, $idUsuario){
    if (isset($_GET['ruta'])) {
        if ($_GET['ruta'] == "cuerpo") {
            // Consulta para contar todos los libros no borrados
            $query = "SELECT * FROM libros WHERE borrado=false";
            $totalLibros = count(selectFunction($query));
            $totalPaginas = ceil($totalLibros / $librosPorPagina);
            return $totalPaginas;
        } elseif ($_GET['ruta'] == "mislibros") {
            // Consulta para contar los libros prestados al usuario
            $query = "SELECT l.id, l.ISBN, l.titulo, p.fecha_inicio, p.fecha_fin, l.prestado FROM libros l 
                      INNER JOIN prestamos p ON l.id = p.id_libro 
                      WHERE p.borrado=false AND l.prestado = true AND p.id_usuario = $idUsuario";
                      $totalLibros = count(selectFunction($query));
                      $totalPaginas = ceil($totalLibros / $librosPorPagina);
                      return $totalPaginas;
        } elseif ($_GET['ruta'] == "librosPrestados") {
            // Consulta para contar todos los libros prestados
            $query = "SELECT libros.ISBN, prestamos.fecha_fin, usuarios.id AS id_usuario, usuarios.usuario, prestamos.fecha_inicio
                      FROM libros
                      INNER JOIN prestamos ON libros.id = prestamos.id_libro
                      INNER JOIN usuarios ON prestamos.id_usuario = usuarios.id
                      WHERE prestamos.borrado=false AND libros.prestado = true ";
                      $totalLibros = count(selectFunction($query));
                      $totalPaginas = ceil($totalLibros / $librosPorPagina);
                      return $totalPaginas;
        }
    }
}

//Verificar de que usuario es el préstamo
function verificarPrestamo($idUsuario,$idLibro){
    $queryPrestamo = "SELECT * FROM prestamos WHERE id_usuario = $idUsuario AND id_libro = $idLibro AND borrado=false";
    return $prestamoExistente = selectFunction($queryPrestamo);
}

 // Verificar la existencia de un libro mediante su ISBN
function verificarLibroExistente($ISBN) {
    $query = "SELECT * FROM libros WHERE ISBN='$ISBN'";
    $result = selectFunction($query);
    return count($result) > 0;
}

// Agregar un nuevo libro a la base de datos
function agregarNuevoLibro($titulo, $ISBN, $editorial, $autor, $rutaImagen) {
    $query = "INSERT INTO libros (titulo, ISBN, editorial, autor, imagen) VALUES ('$titulo', '$ISBN','$editorial', '$autor','$rutaImagen')";
    insertFunction($query);
    header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=cuerpo");
    exit;
}

// Buscar libros por título
function buscarLibrosPorTitulo($titulo) { 
    $queryLibro = "SELECT DISTINCT * FROM libros WHERE titulo LIKE '%$titulo%' AND borrado=false LIMIT 0,5";
    $libros = selectFunction($queryLibro);
    return $libros;
}

// Nos permite insertar el préstamo y modificar el libro a prestado
function adquirirLibro($idLibro, $paginaActual) {
    // Fecha actual
    $fecha_inicio = date('Y-m-d');
    $idUsuario = $_SESSION["id_usuario"];

    // Actualizar el estado del libro a prestado en la base de datos
    $update_query = "UPDATE libros SET prestado=true WHERE id=$idLibro";
    updateFunction($update_query);

    // Registrar el préstamo del libro para el usuario en la base de datos
    $guardar_query = "INSERT INTO prestamos(id_usuario, id_libro, fecha_inicio) VALUES ('$idUsuario','$idLibro','$fecha_inicio')";
    insertFunction($guardar_query);

    // Redireccionar según la ruta y la página actual
    redirectSegunRuta($idLibro, $paginaActual);
}

//Nos permite actualizar los datos respecto al prestamo cuando se devuelve el libro
function devolverLibro($idLibro, $ruta, $paginaActual) {
    // Actualizar el estado del libro a no prestado en la base de datos
    $updateLibroQuery = "UPDATE libros SET prestado=false WHERE id=$idLibro";
    updateFunction($updateLibroQuery);
    
    // Marcar el préstamo del libro como borrado en la base de datos
    $borrarPrestamoQuery = "UPDATE prestamos SET borrado=true WHERE id_libro=$idLibro";
    updateFunction($borrarPrestamoQuery);
    
    // Redireccionar según la ruta, el libro y la página actual
    redireccionar($ruta, $idLibro, $paginaActual);
}

// Obtener información detallada de un libro específico de la base de datos
function obtenerInfoLibro($idLibro) {
    $query = "SELECT * FROM libros WHERE id = $idLibro AND borrado = false";
    $libros= selectFunction($query);
    return $libros[0];
}

// Marcar un libro como borrado en la base de datos
function eliminarLibro($idLibro) {
    $query = "UPDATE libros SET borrado=true WHERE id = $idLibro";
    updateFunction($query);
    // Redireccionar a la página principal
    header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=cuerpo");
    exit;
}

//nos permite gestionar la búsqueda según sea su resultado
function realizarBusquedaAvanzada($ISBN, $titulo, $autor, $editorial) {
    // Verifica si todos los campos de búsqueda están vacíos
    if (empty($ISBN) && empty($titulo) && empty($autor) && empty($editorial)) {
        echo '<script>alert("Rellene al menos un campo");</script>';
        return;
    }

    // Construye la consulta SQL.
    $query = construirConsulta($ISBN, $titulo, $autor, $editorial);
    $resultLibro = selectFunction($query);

    // Verifica si se encontraron resultados de búsqueda
    if ($resultLibro) {
        $contador = count($resultLibro);

        // Redirige a la información detallada del libro si se encuentra un único resultado
        if ($contador === 1) {
            $libro = $resultLibro[0];
            $idLibro = $libro['id'];
            header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=infoLibro&id=" . $idLibro . "&pagina=1");
            exit;
        } elseif ($contador > 1) {
            // Muestra una alerta si hay más de un libro con las características proporcionadas
            echo '<script>alert("Hay más de un libro con estas características. Introduce más especificaciones");</script>';
        } else {
            // Muestra una alerta si no se encontraron resultados
            echo '<script>alert("No se encontraron resultados");</script>';
        }
    } else {
        // Muestra una alerta si no se encontró ningún resultado para la búsqueda
        echo '<script>alert("No se encontraron resultados para su búsqueda");</script>';
    }
}

// Construir la consulta SQL basada en los campos proporcionados
function construirConsulta($ISBN, $titulo, $autor, $editorial) {
    $query = "SELECT * FROM libros WHERE 1 AND borrado=false";
    if (!empty($ISBN)) {
        $query .= " AND ISBN = '$ISBN'";
    }

    if (!empty($titulo)) {
        $query .= " AND titulo = '$titulo'";
    }

    if (!empty($autor)) {
        $query .= " AND autor = '$autor'";
    }

    if (!empty($editorial)) {
        $query .= " AND editorial = '$editorial'";
    }
    return $query;
}
?>