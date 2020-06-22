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
            <h2>Refacciones que coinciden</h2>
            <table class="consulta">
                <tr class="cabecera_con">
                    <td>Cliente</td>
                    <td>Nombre</td>
                    <td>Refaccionaria</td>
                    <td>Dirección</td>
                    <td>Teléfono</td>
                </tr>

            <?php
            require '../conexion.php';
            $nombre = $_POST['nombre'];

            if (!$conexion) {
                die("Connection failed: " . mysqli_connect_error());
            }else{
                if($nombre == '' || $nombre ==null){
                    echo "  <script type='text/javascript'>
                                alert('Campos vacíos');
                                window.location.href='modificar_1.php';
                            </script>";
                }else{
                    $consulta = "SELECT * FROM cliente WHERE nombre LIKE '%$nombre%'";
                    $result = mysqli_query($conexion, $consulta);
                }

                if ($result) {
                    while($mostrar = mysqli_fetch_array($result)){
                        if($mostrar['nombre']){
                ?>
                    <tr>
                        <td><a href="modificar_2.php?ref=<?php echo $mostrar['id'] ?>"><?php echo $mostrar['id'] ?></a></td>
                        <td><a href="modificar_2.php?ref=<?php echo $mostrar['id'] ?>"><?php echo $mostrar['nombre'] ?></a></td>
                        <td><a href="modificar_2.php?ref=<?php echo $mostrar['id'] ?>"><?php echo $mostrar['refaccionaria'] ?></a></td>
                        <td><a href="modificar_2.php?ref=<?php echo $mostrar['id'] ?>"><?php echo $mostrar['direccion'] ?></a></td>
                        <td><a href="modificar_2.php?ref=<?php echo $mostrar['id'] ?>"><?php echo $mostrar['telefono'] ?></a></td>
                    </tr>
                <?php
                        }else{
                            break;
                        }
                    }

                }else{
                    echo "Error: ".$consulta."<br>".mysqli_error($conexion);
                }

            }
            ?>
            </table>
        </section>
    </body>
</html>