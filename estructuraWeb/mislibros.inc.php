<div id="cuerpo">
    <div id="tabla">
        <table>
            <thead>
                <!-- Cabecera de la tabla -->
                <tr>
                    <th>ISBN</th>
                    <th>Título</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Verifica si existen libros y si el array de libros no está vacío
                if (isset($libros) && !empty($libros)) {
                    foreach ($libros as $libro) {
                        $idLibro = $libro['id'];
                ?>
                        <!-- Detalles de cada libro en la tabla -->
                        <tr>
                            <td><?php echo $libro['ISBN']; ?></td>
                            <td><?php echo $libro['titulo']; ?></td>
                            <td><?php echo $libro['fecha_inicio']; ?></td>
                            <td><?php echo $libro['fecha_fin']; ?></td>
                            <!-- Enlace para devolver un libro -->
                            <td><a id="devolver" href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=mislibros&devolver=" . $libro['id']; ?>">Devolver</a></td>
                        </tr>
                <?php
                    }
                } else { ?>
                    <!-- Mensaje si no hay libros adquiridos -->
                    <tr>
                        <td colspan="5">Actualmente no has adquirido ningún libro.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    
    <div id="paginacion">
        <!-- Boton para retroceder páginas -->
        <?php if ($paginaActual > 1) { ?>
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=mislibros&pagina=" . ($paginaActual - 1); ?>"><button id="pagAtras"><</button></a>
        <?php } ?>

        <!-- Etiqueta de la página actual -->
        <label>Página <?php echo $paginaActual; ?></label>

        <?php if ($paginaActual < $totalPaginas) { ?>
            <!-- Boton para avanzar páginas -->
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=mislibros&pagina=" . ($paginaActual + 1); ?>"><button id="pagAdelante">></button></a>
        <?php } ?>
    </div>
</div>