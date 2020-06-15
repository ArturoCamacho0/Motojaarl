<?php
$clave = $_GET['ref'];
$clave = (string)$clave;

if($clave){
    require '../conexion.php';
    if(!$conexion){
        die("Connection failed: " . mysqli_connect_error());
    }else{
        $consulta = "SELECT * FROM refacciones WHERE clave LIKE '%$clave%'";
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
            <h2><?php echo $mostrar['nombre'] ?></h2>
            <img src="<?php echo $mostrar['imagen'] ?>"/>
            <div class="refacciones">
                <div class="caja_contenido">
                    <h2>Datos del producto</h2>
                    <h4>Clave: <?php echo $mostrar['clave'] ?></h4>
                    <h4>Descripción: <?php echo $mostrar['descripcion'] ?></h4>
                    <h4>Tipo: <?php echo $mostrar['tipo'] ?></h4>
                    <h4>Existencia: <?php echo $mostrar['existencia'] ?></h4>
                </div>

                <div class="caja_precio">
                <h2>Precios del producto</h2>
                    <?php
                        $precio = (float) $mostrar['precio_compra'];
                        $cliente_men = ($precio * 0.2) + $precio;
                        $cliente_may = ($precio * 0.1) + $precio;
                    ?>
                    <h3>Precio de compra $<?php echo $precio ?> MXN</h3>
                    <h3>Precio minorista $<?php echo $cliente_men ?> MXN</h3>
                    <h3>Precio mayorista $<?php echo $cliente_may ?> MXN</h3>
                </div>
            </div>
        </section>
    </body>
</html>