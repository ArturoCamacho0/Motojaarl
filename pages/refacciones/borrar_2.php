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
                    <td>Clave</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Tipo</td>
                    <td>Existencia</td>
                </tr>

            <?php
            require '../conexion.php';
            if(isset($_POST["clave"])){
                $clave = $_POST['clave'];
                $nombre = null;

            }else if(isset($_POST["nombre"])){
                $nombre = $_POST['nombre'];
                $clave = null;
            }

            if (!$conexion) {
                die("Connection failed: " . mysqli_connect_error());
            }else{
                if($nombre == '' || $nombre ==null){
                    if($clave == '' || $clave == null){
                        echo "  <script type='text/javascript'>
                                    alert('Campos vacíos');
                                    window.location.href='borrar_1.php';
                                </script>";
                    }else{
                        $consulta = "SELECT * FROM refacciones WHERE clave LIKE '%$clave%'";
                        $result = mysqli_query($conexion, $consulta);
                    }
                }else{
                    $consulta = "SELECT * FROM refacciones WHERE nombre LIKE '%$nombre%'";
                    $result = mysqli_query($conexion, $consulta);
                }

                if ($result) {
                    while($mostrar = mysqli_fetch_array($result)){
                        if($mostrar['nombre']){
                ?>
                    <tr>
                        <td><a href="borrar_3.php?ref=<?php echo $mostrar['clave'] ?>"><?php echo $mostrar['clave'] ?></a></td>
                        <td><a href="borrar_3.php?ref=<?php echo $mostrar['clave'] ?>"><?php echo $mostrar['nombre'] ?></a></td>
                        <td><a href="borrar_3.php?ref=<?php echo $mostrar['clave'] ?>"><?php echo $mostrar['descripcion'] ?></a></td>
                        <td><a href="borrar_3.php?ref=<?php echo $mostrar['clave'] ?>"><?php echo $mostrar['tipo'] ?></a></td>
                        <td><a href="borrar_3.php?ref=<?php echo $mostrar['clave'] ?>"><?php echo $mostrar['existencia'] ?></a></td>
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