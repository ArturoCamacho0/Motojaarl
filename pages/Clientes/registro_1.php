<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Motojaarl</title>
        <link rel="stylesheet" type="text/css" href="../../styles/inicio.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" type="text/css" href="../../styles/registro.css?v=<?php echo time(); ?>"/>
    </head>

    <body>
        <!-- Menu y cabecera -->
        <header class="cabecera">
            <h1>MOTOJAARL</h1>
            <ul class="menu">
                <li><a href="../inicio.php">Inicio</a></li>

                <li>Refacciones
                <ul class="submenu">
                        <li><a href="../refacciones/consulta_1.php">Consultar</a></li>
                        <li><a href="../refacciones/registro_1.php">Agregar</a></li>
                        <li><a href="../refacciones/modificar_1.php">Modificar</a></li>
                        <li><a href="../refacciones/borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li>Clientes
                    <ul class="submenu">
                        <li><a href="./consulta_1.php">Consultar</a></li>
                        <li><a href="./registro_1.php">Agregar</a></li>
                        <li><a href="./modificar_1.php">Modificar</a></li>
                        <li><a href="./borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li>Ventas
                    <ul class="submenu">
                        <li><a href="../ventas/mostrador_1.php">Mostrador</a></li>
                        <li><a href="../ventas/cliente_1.php">Cliente</a></li>
                        <li><a href="../ventas/consulta_1.php">Consultar</a></li>
                        <li><a href="../ventas/borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li><a href="../cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </header>

        <!-- Contenido -->
        <section class="contenido">
            <h2>Registro de clientes</h2>
            <form class="reg" method="POST" action="./registro_2.php">
                <label for="nombre">Nombre del cliente</label>
                <input type="text" name="nombre"/>
                <label for="refaccionaria">Nombre de la refaccionara o taller</label>
                <input type="text" name="refaccionaria">
                <label for="direccion">Dirección de la refaccionaria</label>
                <input type="text" name="direccion"/>
                <label for="telefono">Telefono</label>
                <input type="number" name="telefono"/>
                <input type="submit" value="Aceptar">
            </form>
        </section>
    </body>
</html>