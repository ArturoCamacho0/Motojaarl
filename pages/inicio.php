<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Motojaarl</title>
        <link rel="stylesheet" type="text/css" href="../styles/inicio.css?v=<?php echo time(); ?>"/>
    </head>

    <body>
        <!-- Menu y cabecera -->
        <header class="cabecera">
            <h1>MOTOJAARL</h1>
            <ul class="menu">
                <li><a href="./inicio.php">Inicio</a></li>

                <li>Refacciones
                    <ul class="submenu">
                        <li><a href="./refacciones/consulta_1.php">Consultar</a></li>
                        <li><a href="./refacciones/registro_1.php">Agregar</a></li>
                        <li><a href="./refacciones/modificar_1.php">Modificar</a></li>
                        <li><a href="./refacciones/borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li>Clientes
                    <ul class="submenu">
                        <li><a href="./clientes/consulta_1.php">Consultar</a></li>
                        <li><a href="./clientes/registro_1.php">Agregar</a></li>
                        <li><a href="./clientes/modificar_1.php">Modificar</a></li>
                        <li><a href="./clientes/borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li>Ventas
                    <ul class="submenu">
                        <li><a href="./ventas/mostrador_1.php">Mostrador</a></li>
                        <li><a href="./ventas/cliente_1.php">Cliente</a></li>
                        <li><a href="./ventas/consulta_1.php">Consultar</a></li>
                        <li><a href="./ventas/borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li><a href="./cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </header>

        <!-- Contenido -->
        <section class="contenido">
            <h2>Bienvenid@!</h2>
            <p>En la parte superior podras encontrar las opciones que puedes realizar.</p>

            <img src="../styles/images/refa.jpg"/>
        </section>
    </body>
</html>