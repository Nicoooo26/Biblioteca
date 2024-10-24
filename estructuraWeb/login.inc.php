<div id="cuerpo">
    <section class="sectionLoginRegistro">
        <form id="divForm" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <h1>LOGIN</h1>
            
            <?php 
            // Mensaje de error si las credenciales son incorrectas
            if (isset($errValidacion) && $errValidacion==true) { ?>
                <p style="color: red;"> Credenciales Incorrectas</p>
            <?php } ?>

            <?php 
            // Mensaje de error si el campo de usuario está vacío
            if(isset($errUsuario) && $errUsuario==true){ ?>
                <p style="color:red;">Campo usuario vacío</p> 
            <?php } ?>
            <label for="usuario">Username:</label><br>
            <input type="text" id="usuario" name="usuario" value="<?php if (isset($usuario)) echo $usuario; ?>" placeholder="Nombre de usuario"><br>

            <?php 
            // Mensaje de error si el campo de contraseña está vacío
            if(isset($errPassword) && $errPassword==true){ ?>
                <p style="color:red;">Campo contraseña vacío</p> 
            <?php } ?>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Contraseña"><br><br>
            <input type="submit" id="enviar" name="enviar" value="Entrar">
            <br><br>
            <a id="registroEnlace" href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=registro"; ?>">¿No tienes cuenta? Regístrate</a>
        </form>		
    </section>
</div>
