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
            <h2>Cambie los datos que quiere modificar</h2>
            <?php
            require '../conexion.php';
            $id = $_GET['ref'];

            if (!$conexion) {
                die("Connection failed: " . mysqli_connect_error());
            }else{
                if($id == '' || $id == null){
                    echo "  <script type='text/javascript'>
                                alert('Campos vacíos');
                                window.location.href='modificar_1.php';
                            </script>";
                }else{
                    $consulta = "SELECT * FROM cliente WHERE id LIKE '%$id%'";
                    $result = mysqli_query($conexion, $consulta);
                }

                if ($result) {
                    while($mostrar = mysqli_fetch_array($result)){
                        if($mostrar['nombre']){
                ?>

                <form class="reg" method="POST" action="./modificar_3.php">
                    <label for="id">No de cliente</label>
                    <input type="text" readonly="readonly" name="id" value="<?php echo $mostrar['id'] ?>"/>
                    <label for="nombre">Nombre del cliente</label>
                    <input type="text" name="nombre" value="<?php echo $mostrar['nombre'] ?>"/>
                    <label for="refaccionaria">Nombre de la refaccionaria</label>
                    <input type="text" name="refaccionaria" value="<?php echo $mostrar['refaccionaria'] ?>"/>
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" value="<?php echo $mostrar['direccion'] ?>"/>
                    <label for="telefono">Teléfono</label>
                    <input type="number" name="telefono" value="<?php echo $mostrar['telefono'] ?>"/>
                    <input type="submit" value="Aceptar"/>
                </form>
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
        </section>
    </body>
</html>