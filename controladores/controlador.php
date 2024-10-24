<?php

include './helpers/others.php';
include './helpers/validaciones.php';   

// Procesamiento del formulario de inicio de sesión
if (isset($_POST["enviar"])) {
    // Obtiene los datos del formulario
    $usuario = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
    $password = isset($_POST["password"]) ? $_POST["password"] : "";

    // Valida el formulario y maneja los errores
    $errores = validarFormulario($usuario, $password);

    if (empty($errores)) {
        // Inicia sesión si la validación es exitosa
        if (iniciarSesion($usuario, $password)) {
            header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=cuerpo");
            exit;
        } else {
            $errValidacion = true;
        }
    } else {
        // Maneja los errores de validación específicos
        $errUsuario = isset($errores['usuario']) ? $errores['usuario'] : false;
        $errPassword = isset($errores['password']) ? $errores['password'] : false;
    }
}

// Procesamiento del formulario de registro
if(isset($_POST["crearCuenta"])){
    // Obtiene los datos del formulario de registro
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $pais = $_POST['pais'];

    // Verifica si el usuario ya existe
    $usuarioExistente = verificarUsuarioExistente($usuario);

    if ($usuarioExistente) {
        $errUserRegistro = true;
    } else {
        // Verifica el formato de los campos nombre, apellidos y país
        $nombreValido = validarFormatoNombre($nombre);
        $apellidosValidos = validarFormatoNombre($apellidos);
        $paisValido = validarFormatoNombre($pais);

        // Maneja errores específicos de formato
        if (!$nombreValido || !$apellidosValidos || !$paisValido ) {
            if (!$nombreValido) {
                $errNombre = true;
            }
            if (!$apellidosValidos) {
                $errApellidos = true;
            }
            if (!$paisValido) {
                $errPais = true;
            }
        } else {
            // Agrega un nuevo usuario si los datos son válidos
            agregarNuevoUsuario($nombre, $apellidos, $email, $usuario, $contrasena, $pais);
        }
    }
}

// Obtener datos de libros si hay un usuario en sesión
if (isset($_SESSION["usuario"])) {
    // Definir variables y obtener información de usuario y libros
    $librosPorPagina = 5;
    $idUsuario = $_SESSION['id_usuario'];
    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    $libros = obtenerDatosLibrosSegunRuta($librosPorPagina, $idUsuario, $paginaActual);
    $userData = obtenerDatosUsuario($idUsuario);
    $totalPaginas = calcularTotalPaginas($librosPorPagina, $idUsuario);
}

// Agregar un nuevo libro si se envió el formulario correspondiente
if (isset($_POST["btnNuevoLibro"])) {
    // Recopilar datos del formulario para agregar un nuevo libro
    $titulo = $_POST['titulo'];
    $ISBN = $_POST['ISBN'];
    $editorial = $_POST['editorial'];
    $autor = $_POST['autor'];
    $imagen = $_FILES['imagen'];
    $nombreImagen = $imagen['name'];
    $rutaImagen = 'img/' . $nombreImagen;

    // Validar el ISBN y verificar si el libro ya existe antes de agregarlo
    if (!validarISBN($ISBN)) {
        $errISBNNoValido = true; // Marcar error si el ISBN no es válido
    } else if (verificarLibroExistente($ISBN)) {
        $errLibroRegistro = true; // Marcar error si el libro ya está registrado
    } else {
        agregarNuevoLibro($titulo, $ISBN, $editorial, $autor, $rutaImagen); // Agregar el nuevo libro a la base de datos
    }
}

// Realizar una búsqueda de libros por título si se envió el formulario de búsqueda
if (isset($_POST["buscar"])) {
    // Recopilar el título proporcionado para buscar libros
    $titulo = $_POST["titulo"];
    $libros = buscarLibrosPorTitulo($titulo); // Realizar la búsqueda de libros por título
}

// Devolver libro si se ha enviado el parámetro 'devolver' por GET
if (isset($_GET['devolver'])) {
    $idLibro = $_GET['devolver'];
    $ruta = $_GET['ruta'];
    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    devolverLibro($idLibro, $ruta, $paginaActual); // Función para devolver un libro
}

// Obtener información del libro si se ha enviado el parámetro 'id' por GET
if (isset($_GET['id'])) {
    $idLibro = $_GET['id'];
    $paginaActual = $_GET['pagina'];

    $libro = obtenerInfoLibro($idLibro); // Obtener información detallada de un libro

    // Eliminar el libro si se ha enviado el parámetro 'eliminar' por GET
    if (isset($_GET['eliminar'])) {
        eliminarLibro($idLibro); // Función para eliminar un libro
    }
}

// Adquirir un libro si se ha enviado el parámetro 'adquirir' por GET
if (isset($_GET['adquirir'])) {
    $idLibro = $_GET['adquirir'];
    $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    adquirirLibro($idLibro, $paginaActual); // Función para adquirir un libro
}

// Manejar la solicitud de búsqueda avanzada si se ha enviado el formulario
if (isset($_POST['buscadorAvanzado'])) {
    // Obtener los datos del formulario de búsqueda avanzada
    $ISBN = isset($_POST['ISBN']) ? $_POST['ISBN'] : '';
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $autor = isset($_POST['autor']) ? $_POST['autor'] : '';
    $editorial = isset($_POST['editorial']) ? $_POST['editorial'] : '';

    // Realizar la búsqueda avanzada con los datos proporcionados
    realizarBusquedaAvanzada($ISBN, $titulo, $autor, $editorial); // Función para la búsqueda avanzada
}
?>