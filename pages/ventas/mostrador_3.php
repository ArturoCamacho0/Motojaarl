<?php
$refacciones = $_POST['refacciones'];
$cliente = $_POST['cliente'];
$monto = $_POST['monto'];

require '../conexion.php';

if (!$conexion) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    $insertar = "INSERT INTO venta(refacciones, cliente, monto) VALUES('$refacciones', '$cliente', '$monto')";

    if($refacciones == '' || $refacciones == null || $cliente == '' || $cliente == null || $monto == '' || $monto == null){
        echo "  <script type='text/javascript'>
                    alert('Campos vacíos');
                    window.location.href='mostrador_1.php';
                </script>";
    }else if (mysqli_query($conexion, $insertar)) {
        echo "  <script type='text/javascript'>
                    alert('Datos guardados correctamente');
                    window.location.href='mostrador_1.php';
                </script>";
    } else {
        echo "Error: ".$insertar."<br>".mysqli_error($conexion);
    }
}