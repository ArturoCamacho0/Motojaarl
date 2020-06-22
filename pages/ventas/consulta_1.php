<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Motojaarl</title>
        <link rel="stylesheet" type="text/css" href="../../styles/inicio.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" type="text/css" href="../../styles/formularios.css?v=<?php echo time(); ?>"/>
    </head>

    <body>
        <!-- Menu y cabecera -->
        <header class="cabecera">
            <h1>MOTOJAARL</h1>
            <ul class="menu">
                <li><a href="../inicio.php">Inicio</a></li>

                <li>Refacciones
                    <ul class="submenu">
                        <li><a href="./consulta_1.php">Consultar</a></li>
                        <li><a href="./registro_1.php">Agregar</a></li>
                        <li><a href="./modificar_1.php">Modificar</a></li>
                        <li><a href="./borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li>Clientes
                    <ul class="submenu">
                        <li><a href="../clientes/consulta_1.php">Consultar</a></li>
                        <li><a href="../clientes/registro_1.php">Agregar</a></li>
                        <li><a href="../clientes/modificar_1.php">Modificar</a></li>
                        <li><a href="../clientes/borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li>Ventas
                    <ul class="submenu">
                        <li><a>Mostrador</a></li>
                        <li><a>Cliente</a></li>
                        <li><a>Consultar</a></li>
                        <li><a>Eliminar</a></li>
                    </ul>
                </li>

                <li><a href="../cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </header>

        <!-- Contenido -->
        <section class="contenido">
            <h2>Consulta de ventas</h2>
            <a class="ven" href="./consulta_may.php">Listar ventas de mayoreo</a>
            <a class="ven" href="./consulta_men.php">Listar ventas de menudeo</a>
            <a class="ven" href="./consulta_tod.php">Listar todas las ventas</a>
        </section>
    </body>
</html>