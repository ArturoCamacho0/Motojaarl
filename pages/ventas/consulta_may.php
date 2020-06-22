<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Motojaarl</title>
        <link rel="stylesheet" type="text/css" href="../../styles/inicio.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" type="text/css" href="../../styles/consulta.css?v=<?php echo time(); ?>"/>
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
                        <li><a href="../clientes/consulta_1.php">Consultar</a></li>
                        <li><a href="../clientes/registro_1.php">Agregar</a></li>
                        <li><a href="../clientes/modificar_1.php">Modificar</a></li>
                        <li><a href="../clientes/borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li>Ventas
                    <ul class="submenu">
                        <li><a href="./mostrador_1.php">Mostrador</a></li>
                        <li><a href="./cliente_1.php">Cliente</a></li>
                        <li><a href="./consulta_1.php">Consultar</a></li>
                        <li><a href="./borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li><a href="../cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </header>

        <!-- Contenido -->
        <section class="contenido">
            <h2>Ventas por mayoreo</h2>
            <table class="consulta">
                <tr class="cabecera_con">
                    <td>Clave</td>
                    <td>Fecha</td>
                    <td>Refacciones</td>
                    <td>Cliente</td>
                    <td>Monto</td>
                </tr>

            <?php
            require '../conexion.php';

            if (!$conexion) {
                die("Connection failed: " . mysqli_connect_error());
            }else{
                $consulta = "SELECT * FROM venta WHERE cliente LIKE 'mayoreo'";
                $result = mysqli_query($conexion, $consulta);

                if ($result) {
                    while($mostrar = mysqli_fetch_array($result)){
                        if($mostrar['id']){
                ?>
                    <tr>
                        <td><?php echo $mostrar['id'] ?></td>
                        <td><?php echo $mostrar['fecha'] ?></td>
                        <td id="re"><?php echo $mostrar['refacciones'] ?></td>
                        <td><?php echo $mostrar['cliente'] ?></td>
                        <td><?php echo $mostrar['monto'] ?></td>
                    </tr>
                <?php
                        }else{
                            break;
                        }
                    }

                }else{
                    echo "<script type='text/javascript'>
                    alert('No hay registros');
                    window.location.href='consulta_1.php';
                </script>";
                }

            }
            ?>
            </table>
        </section>
    </body>
</html>