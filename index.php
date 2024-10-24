<?php
session_start(); 
include './controladores/controlador.php';   
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <link rel="icon" type="favicon/x-icon" href="img/icon.png" />
    <link rel="stylesheet" type="text/css" href="micss/styles.css" />
    <title>Bibliotech</title>
</head>
<body>
    <?php include_once "estructuraWeb/cabecera.inc.php";?>
    
    <div id="container">
        <?php 
        if (empty($_GET) && !isset($_SESSION["usuario"])) {
            include_once "estructuraWeb/login.inc.php";
        } elseif (!isset($_SESSION["usuario"])) {
            if (isset($_GET["ruta"]) && $_GET["ruta"] == "registro") {
                include_once "estructuraWeb/registro.inc.php";
            } elseif (isset($_GET["ruta"]) && $_GET["ruta"] == "login") {
                include_once "estructuraWeb/login.inc.php";
            } else {
                header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=login");   
                exit;           
            }
        } elseif (isset($_SESSION["usuario"])) {
            include_once "estructuraWeb/menu.inc.php";

            if (isset($_GET["ruta"])) {
                switch ($_GET["ruta"]) {
                    case "cuerpo":
                        include_once "estructuraWeb/cuerpo.inc.php";
                        break;
                    case "busquedaAvanzada":
                        include_once "estructuraWeb/busquedaAvanzada.inc.php";
                        break;
                    case "perfil":
                        include_once "estructuraWeb/perfil.inc.php";
                        break;
                    case "logout":
                        include_once "estructuraWeb/logout.inc.php";
                        break;
                    case "403forbidden":
                        include_once "estructuraWeb/403forbidden.inc.php";
                        break;
                    case "anadirLibro":
                        if ($_SESSION["rol"] == "administrador") {
                            include_once "estructuraWeb/anadirLibro.inc.php";
                        } else {
                            header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=403forbidden");
                            exit;
                        }
                        break;
                    case "mislibros":
                        include_once "estructuraWeb/mislibros.inc.php";
                        break;
                    case "librosPrestados":
                        if ($_SESSION['rol'] == "administrador") {
                            include_once "estructuraWeb/librosPrestados.inc.php";
                        } else {
                            header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=403forbidden");
                            exit;
                        }
                        break;
                    case "infoLibro":
                        include_once "estructuraWeb/infoLibro.inc.php";
                        break;
                    default:
                        header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=cuerpo");
                        exit;
                }
            } else {
                header("Location: " . $_SERVER["PHP_SELF"] . "?ruta=cuerpo");
            }
        }
        ?>
    </div>
    
    <?php include_once "estructuraWeb/pie.inc.php";?>
</body>
</html>
