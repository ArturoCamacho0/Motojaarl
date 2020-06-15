<?php
$clave = $_GET['ref'];
$clave = (string)$clave;

if($clave){
    require '../conexion.php';
    if(!$conexion){
        die("Connection failed: " . mysqli_connect_error());
    }else{
        $consulta = "SELECT * FROM cliente WHERE id LIKE '%$clave%'";
        $result = mysqli_query($conexion, $consulta);
        $mostrar = mysqli_fetch_array($result);
    }
}else{
    echo "  <script type='text/javascript'>
                alert('Error en la consulta');
                window.location.href='consulta_2.php';
            </script>";
}
?>

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
            <h2>Datos del cliente</h2>
            <div class="refacciones">
                <div class="caja_contenido cliente">
                    <h4>Cliente No: <?php echo $mostrar['id'] ?></h4>
                    <h4>Nombre del cliente: <?php echo $mostrar['nombre'] ?></h4>
                    <h4>Nombre de la refaccionaria: <?php echo $mostrar['refaccionaria'] ?></h4>
                    <h4>Dirección de la refaccionaria: <?php echo $mostrar['direccion'] ?></h4>
                    <h4>Teléfono: <?php echo $mostrar['telefono'] ?></h4>
                </div>
            </div>
        </section>
    </body>
</html>