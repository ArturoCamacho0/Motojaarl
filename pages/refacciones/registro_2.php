<?php
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio_compra = $_POST['precio_compra'];
$imagen = $_POST['imagen'];
$tipo = $_POST['tipo'];
$existencia = $_POST['existencia'];

require '../conexion.php';

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    $insertar = "INSERT INTO refacciones(clave, nombre, descripcion, precio_compra, imagen, tipo, existencia) VALUES('$clave', '$nombre', '$descripcion', $precio_compra, '$imagen', '$tipo', $existencia)";

    if($nombre == '' || $nombre == null || $descripcion == '' || $precio_compra == null || $tipo == 'Seleccione el tipo de refacción' || $existencia == '' || $existencia == null){
        echo "  <script type='text/javascript'>
                    alert('Campos vacíos');
                    window.location.href='registro_1.php';
                </script>";
    }else if (mysqli_query($conexion, $insertar)) {
        echo "  <script type='text/javascript'>
                    alert('Datos guardados correctamente');
                    window.location.href='registro_1.php';
                </script>";
    } else {
        echo "Error: ".$insertar."<br>".mysqli_error($conexion);
    }
}