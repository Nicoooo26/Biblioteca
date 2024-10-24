<div id="cuerpo">
    <!-- Formulario de búsqueda -->
    <div id="buscador">
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>?ruta=cuerpo" method="post">
            <input type="text" placeholder="Busque el título aquí..." name="titulo">
            <input type="submit" value="Buscar" id="buscar" name="buscar">
        </form>
    </div>
    
    <!-- Tabla para mostrar los libros -->
    <div id="tabla">
        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Editorial</th>
                    <th>Autor</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Si existen libros y no está vacío
                if (isset($libros) && !empty($libros)) {
                    foreach ($libros as $libro) {
                        // Obtener información del libro
                        $idLibro = $libro['id'];
                        $prestado = $libro['prestado'];
                ?>
                        <tr>
                            <td><?php echo $libro['ISBN']; ?></td>
                            <td id="a">
                                <!-- Enlace al detalle del libro -->
                                <a id="info" href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=infoLibro&pagina=" . $paginaActual . "&id=" . $idLibro; ?>">
                                    <?php echo $libro['titulo']; ?>
                                </a>
                            </td>
                            <td><?php echo $libro['editorial']; ?></td>
                            <td><?php echo $libro['autor']; ?></td>
                            <td>
                                <?php
                                // Verificar el estado del libro (prestado o no)
                                if ($prestado) {
                                    $prestamoExistente=verificarPrestamo($idUsuario,$idLibro);  
                                    // Mostrar el enlace para devolver o "Prestado"
                                    if (count($prestamoExistente) > 0) {
                                        echo '<a id="devolver" href="' . $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=" . $paginaActual . "&devolver=" . $libro['id'] . '">Devolver</a>';
                                    } else {
                                        echo '<label id="prestado">Prestado</label>';
                                    }
                                } else {
                                    echo '<a id="adquirir" href="' . $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=" . $paginaActual . "&adquirir=" . $libro['id'] . '">Adquirir</a>';
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                } else { ?>
                    <!-- Mostrar un mensaje si no hay resultados -->
                    <tr>
                        <td colspan="5">No se encontraron resultados</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <!-- Controles de paginación -->
    <div id="paginacion">
        <?php if ($paginaActual > 1) { ?>
            <!-- Botones para ir a páginas anteriores -->
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=1"; ?>"><button id="pagAtras"><<</button></a>
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=" . ($paginaActual - 1); ?>"><button id="pagAtras"><</button></a>
        <?php } ?>

        <label>Página <?php echo $paginaActual; ?></label>

        <?php if ($paginaActual < $totalPaginas) { ?>
            <!-- Botones para ir a páginas siguientes -->
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=" . ($paginaActual + 1); ?>"><button id="pagAdelante">></button></a>
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=cuerpo&pagina=" . $totalPaginas; ?>"><button id="pagAdelante">>></button></a>
        <?php } ?>
    </div>
</div>