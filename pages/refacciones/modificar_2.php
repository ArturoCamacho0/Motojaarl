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
            <h2>Cambie los datos que quiere modificar</h2>
            <?php
            require '../conexion.php';
            $clave = $_POST['clave'];

            if (!$conexion) {
                die("Connection failed: " . mysqli_connect_error());
            }else{
                if($clave == '' || $clave == null){
                    echo "  <script type='text/javascript'>
                                alert('Campos vacíos');
                                window.location.href='modificar_1.php';
                            </script>";
                }else{
                    $consulta = "SELECT * FROM refacciones WHERE clave LIKE '%$clave%'";
                    $result = mysqli_query($conexion, $consulta);
                }

                if ($result) {
                    while($mostrar = mysqli_fetch_array($result)){
                        if($mostrar['nombre']){
                ?>

                <form class="reg" method="POST" action="./modificar_3.php">
                    <label for="clave">Clave</label>
                    <input type="text" name="clave" value="<?php echo $mostrar['clave'] ?>"/>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" value="<?php echo $mostrar['nombre'] ?>"/>
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion"> <?php echo $mostrar['existencia'] ?> </textarea>
                    <label for="precio_compra">Precio de compra</label>
                    <input type="number" step="0.1" name="precio_compra" value="<?php echo $mostrar['precio_compra'] ?>"/>
                    <label for="imagen">Imagen</label>
                    <input type="file" name="imagen"/>
                    <label for="tipo">Tipo</label>
                    <input type="text" name="tipo" value="<?php echo $mostrar['tipo'] ?>"/>
                    <label for="existencia">Existencia</label>
                    <input type="number" min="0" name="existencia" value="<?php echo $mostrar['existencia'] ?>"/>
                    <input type="submit" value="Aceptar">
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