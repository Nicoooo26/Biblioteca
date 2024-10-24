<?php

// Función para validar el formulario de inicio de sesión
function validarFormulario($usuario, $password) {
    $errores = array();

    // Verifica si el campo de usuario está vacío
    if (empty($usuario)) {
        $errores['usuario'] = true;
    }
    
    // Verifica si el campo de contraseña está vacío
    if (empty($password)) {
        $errores['password'] = true;
    }

    return $errores;
}

// Función para validar el formato del nombre
function validarFormatoNombre($texto) {
    // Utiliza una expresión regular para verificar si el texto contiene solo letras y espacios
    return preg_match('/^[A-Za-záéíóúÁÉÍÓÚñÑ\s]+$/', $texto);
}

// Función para validar el formato del ISBN
function validarISBN($ISBN) {
    // Utiliza una expresión regular para validar el formato del ISBN
    return preg_match('/^978-\d{10}$/', $ISBN);
}
?>