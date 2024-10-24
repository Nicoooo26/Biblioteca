<div id="cuerpo">
    <section class="sectionAnadirLibro">
        <form id="divForm" action="<?php echo $_SERVER["PHP_SELF"];?>?ruta=anadirLibro" method="post" enctype="multipart/form-data">
            <h1>Introduzca los datos del nuevo libro:</h1>

            <!-- Comprobación de errores al registrar un libro -->
            <?php if(isset($errLibroRegistro) && $errLibroRegistro==true){?>
                <p style="color:red;">ISBN existente</p>
            <?php }?>

            <!-- Validación de un ISBN no válido -->
            <?php if(isset($errISBNNoValido) && $errISBNNoValido==true){ ?>
                <p style="color:red;">ISBN No Válido</p>
            <?php } ?>

            <label for="titulo">Titulo</label><br>
            <input type="text" id="titulo" name="titulo" value="<?= isset($titulo) ? $titulo : ''; ?>" required><br><br>

            <label for="ISBN">ISBN</label><br>
            <input type="text" name="ISBN" id="ISBN" value="<?= isset($ISBN) ? $ISBN : ''; ?>" required><br><br>

            <label for="editorial">Editorial</label><br>
            <input type="text" id="editorial" name="editorial" value="<?= isset($editorial) ? $editorial : ''; ?>" required><br><br>

            <label for="autor">Autor</label><br>
            <input type="text" id="autor" name="autor" value="<?= isset($autor) ? $autor : ''; ?>" required><br><br>

            <label for="imagen">Seleccionar Imagen</label><br>
            <input type="file" id="imagen" name="imagen" accept="image/*" required><br><br>

            <input type="submit" id="btnNuevoLibro" name="btnNuevoLibro" value="Añadir a la biblioteca"><br>
        </form>     
    </section>
</div>
