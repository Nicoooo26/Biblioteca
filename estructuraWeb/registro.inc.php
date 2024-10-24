<div id="cuerpo">
    <section class="sectionRegistro">
        <form id="divFormRegistro" action="<?php echo $_SERVER["PHP_SELF"]; ?>?ruta=registro" method="post">
            <h1>Regístrate</h1>

            <!-- Mensaje de error si el usuario ya existe -->
            <?php if (isset($errUserRegistro) && $errUserRegistro == true) { ?>
                <p style="color:red;">Usuario existente</p>
            <?php } ?>

            <div id="div1">
                <div id="div11">
                    <label for="nombre">* Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="<?php if (isset($nombre)) echo $nombre; ?>" required>
                    <!-- Mensaje de error si el nombre no es válido -->
                    <?php if (isset($errNombre) && $errNombre == true) { ?>
                        <p style="color:red;">Nombre no válido</p>
                    <?php } ?>
                </div>
                <div id="div11">
                    <label for="apellidos">* Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" value="<?php if (isset($apellidos)) echo $apellidos; ?>" required>
                    <!-- Mensaje de error si los apellidos no son válidos -->
                    <?php if (isset($errApellidos) && $errApellidos == true) { ?>
                        <p style="color:red;">Apellidos no válidos</p>
                    <?php } ?>
                </div>
                <div id="div11">
                    <label for="usuario">* Usuario</label>
                    <input type="text" id="usuario" name="usuario" required>
                </div>
                <div id="div11">
                    <label for="pais">País</label>
                    <input type="text" id="pais" name="pais" value="<?php if (isset($pais)) echo $pais; ?>">
                    <!-- Mensaje de error si el país no es válido -->
                    <?php if (isset($errPais) && $errPais == true) { ?>
                        <p style="color:red;">País no válido</p>
                    <?php } ?>
                </div>
            </div>

            <div id="div2">
                <div id="div21">
                    <label for="email">* Email</label>
                    <input type="email" id="email" name="email" value="<?php if (isset($email)) echo $email; ?>" required>
                </div>
                <div id="div21">
                    <label for="contrasena">* Contraseña</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>
            </div>
            <input type="submit" id="crearCuenta" name="crearCuenta" value="Crear cuenta">
            <a id="loginEnlace" href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=login"; ?>">¿Ya tienes cuenta? Inicia sesión</a>
        </form>
    </section>
</div>