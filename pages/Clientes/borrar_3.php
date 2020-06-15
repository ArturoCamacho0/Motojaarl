<?php
$clave = $_GET['ref'];
$clave = (string)$clave;

require '../conexion.php';

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    $borrar = "DELETE FROM cliente WHERE id = '$clave'";

    if($clave == '' || $clave == null){
        echo "  <script type='text/javascript'>
                    alert('Campos vacíos');
                    window.location.href='borrar_1.php';
                </script>";
    }else if (mysqli_query($conexion, $borrar)) {
        echo "  <script type='text/javascript'>
                    alert('Datos eliminados correctamente');
                    window.location.href='borrar_1.php';
                </script>";
    } else {
        echo "Error: ".$borrar."<br>".mysqli_error($conexion);
    }
}