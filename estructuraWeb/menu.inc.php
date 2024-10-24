<div class="menu">
    <nav>
        <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=cuerpo"; ?>">CATÁLOGO</a><br><br>
        <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=busquedaAvanzada"; ?>">BÚSQUEDA AVANZADA</a><br><br>
        <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=perfil"; ?>">PERFIL</a><br><br>
        <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=mislibros"; ?>">MIS LIBROS</a><br><br>
        
        <?php if(isset($_SESSION["rol"]) && $_SESSION["rol"]=="administrador"){ ?>
            <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=anadirLibro"; ?>">AÑADIR LIBRO +</a><br><br>
            <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=librosPrestados"; ?>">LIBROS PRESTADOS</a><br><br>
        <?php } ?>
        
        <a href="<?php echo $_SERVER["PHP_SELF"]."?ruta=logout"; ?>" id="cerrarSesion">CERRAR SESION</a>
    </nav>
</div>
