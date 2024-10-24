<div id="cuerpo">
    <div id="infoDiv">
        <h2>Detalles del Libro</h2>
        <div id="sinBoton">
            <div id="infoLibro">
                <!-- Mostrar información del libro -->
                <p>ID: <?php echo $idLibro; ?></p>
                <p>Título: <?php echo $libro['titulo']; ?></p>
                <p>ISBN: <?php echo $libro['ISBN']; ?></p>
                <p>Editorial: <?php echo $libro['editorial']; ?></p>
                <p>Autor: <?php echo $libro['autor']; ?></p>
                <p>Estado: <?php echo ($libro['prestado']) ? "Prestado" : "No Prestado"; ?></p>
            </div>

            <?php if (!empty($libro['imagen'])) : ?>
                <!-- Mostrar la imagen del libro si está disponible -->
                <div id="imagenLibro">
                    <img src="<?php echo './' . $libro['imagen']; ?>" alt="Imagen del libro">
                </div>
            <?php endif; ?>
        </div>

        <div id="volverLista">
            <?php if ($_SESSION['rol'] == "administrador") : ?>
                <!-- Enlace para eliminar un ejemplar (solo visible para administradores) -->
                <a id="eliminarEjemplar" href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=infoLibro&id=" . $idLibro . "&eliminar=1"; ?>">Eliminar ejemplar</a>
            <?php endif; ?>

            <?php
                // Verificar si el libro está prestado por el usuario actual
                $prestamoExistente = verificarPrestamo($idUsuario,$idLibro);
                if (count($prestamoExistente) > 0) {
                    // El libro ha sido prestado por el usuario actual, mostrar el botón "Devolver"
                    echo '<a id="devolver" href="' . $_SERVER["PHP_SELF"] . "?ruta=infoLibro&devolver=" . $idLibro . '">Devolver</a>';
                } elseif($libro['prestado']==false) {
                    // El libro no está prestado, mostrar el botón "Adquirir"
                    echo '<a id="adquirir" href="' . $_SERVER["PHP_SELF"] . "?ruta=infoLibro&adquirir=" . $idLibro . '">Adquirir</a>';
                }
            ?>

            <!-- Volver a la lista de libros -->
            <a id="volverCuerpo" href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=" . (isset($paginaActual) ? $paginaActual : 1); ?>">Volver a la lista de libros</a>
        </div>
    </div>
</div>
