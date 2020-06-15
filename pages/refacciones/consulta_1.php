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
            <h2>Consulta de refacciones</h2>
            <form class="consulta_form" method="POST" action="consulta_2.php">
                <h3>Consulta por clave</h3>
                <label for="clave">Ingrese la clave del producto que desea consultar</label>
                <input type="text" name="clave"/>
                <input type="submit" value="Buscar"/>
            </form>

            <form class="consulta_form" method="POST" action="consulta_2.php">
                <h3>Consulta por nombre</h3>
                <label for="nombre">Ingrese el nombre del producto que desea consultar</label>
                <input type="text" name="nombre" id="nombre"/>
                <input type="submit" value="Buscar"/>
            </form>
        </section>
    </body>
</html>