<div id="cuerpo">
    <div class="perfil">
        <h2>Perfil de <?php echo $_SESSION["usuario"]; ?></h2>
        <p><strong>Nombre:</strong> <?php echo $userData['nombre']; ?></p>
        <p><strong>Apellidos:</strong> <?php echo $userData['apellidos']; ?></p>
        <p><strong>Email:</strong> <?php echo $userData['email']; ?></p>
        <p><strong>País:</strong> <?php echo $userData['pais']; ?></p>
        <p><strong>Tipo de usuario:</strong> <?php echo $userData['tipo']; ?></p>
        <br><br><br><br><br>
        <a href="<?php echo $_SERVER["PHP_SELF"] . "?ruta=logout"; ?>">CERRAR SESION</a>
      
    </div>
</div>
