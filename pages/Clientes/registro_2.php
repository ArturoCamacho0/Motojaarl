<?php
$nombre = $_POST['nombre'];
$refaccionaria = $_POST['refaccionaria'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

require '../conexion.php';

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    $insertar = "INSERT INTO cliente(nombre, refaccionaria, direccion, telefono) VALUES('$nombre', '$refaccionaria', '$direccion', '$telefono')";

    if($nombre == '' || $nombre == null || $refaccionaria == '' || $refaccionaria == null || $direccion == '' || $direccion == null || $telefono == 0 || $telefono == null){
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