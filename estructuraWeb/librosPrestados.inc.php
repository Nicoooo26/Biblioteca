<div id="cuerpo">
    <div id="tabla">
        <table>
            <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Id Usuario</th>
                    <th>Username</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                // Verifica si existen libros y los recorre para mostrarlos en la tabla
                if (isset($libros) && !empty($libros)) {
                    foreach ($libros as $libro) {
                ?>
                        <!-- Detalles de cada libro prestado -->
                        <tr>
                            <td><?php echo $libro['ISBN']; ?></td>
                            <td><?php echo $libro['id_usuario']; ?></td>
                            <td><?php echo $libro['usuario']; ?></td>
                            <td><?php echo $libro['fecha_inicio']; ?></td>
                            <td><?php echo $libro['fecha_fin']; ?></td>
                        </tr>
                <?php
                    }
                } else { 
                ?>
                    <!-- Si no hay libros prestados, muestra un mensaje -->
                    <tr>
                        <td colspan="5">No hay libros prestados en este momento.</td>
                    </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>
    </div>
    <div id="paginacion">
        <?php if ($paginaActual > 1) { ?>
            <!-- Botones para retroceder páginas -->
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=librosPrestados&pagina=1"; ?>"><button id="pagAtras"><<</button></a>
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=librosPrestados&pagina=" . ($paginaActual - 1); ?>"><button id="pagAtras"><</button></a>
        <?php } ?>

        <label>Página <?php echo $paginaActual; ?></label>

        <?php if ($paginaActual < $totalPaginas) { ?>
            <!-- Botones para avanzar páginas -->
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=librosPrestados&pagina=" . ($paginaActual + 1); ?>"><button id="pagAdelante">></button></a>
            <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=librosPrestados&pagina=" . $totalPaginas; ?>"><button id="pagAdelante">>></button></a>
        <?php } ?>
    </div>
</div>