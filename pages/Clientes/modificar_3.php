<?php
require '../conexion.php';
$clave = $_POST['id'];
$nombre = $_POST['nombre'];
$refaccionaria = $_POST['refaccionaria'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];

    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "Connected successfully\n";
    }

    $modificar = "UPDATE cliente 
                  SET nombre = '$nombre', refaccionaria = '$refaccionaria', direccion = '$direccion', telefono = '$telefono'
                  WHERE id = '$clave';";

    try{
        $sql = mysqli_query($conexion, $modificar);
    }catch(Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }

    if($nombre == '' || $nombre == null || $refaccionaria == '' || $refaccionaria == null || $direccion == '' || $direccion == null || $telefono == 0 || $telefono == null){
        echo "  <script type='text/javascript'>
                    alert('Campos vacíos');
                    window.location.href='./modificar_1.php';
                </script>";
    }else if ($sql){
        echo "  <script type='text/javascript'>
                    alert('Datos actualizados correctamente');
                    window.location.href='modificar_1.php';
                </script>";
    } else {
        echo "Error: ".$modificar."<br>".mysqli_error($conexion);
    }
?>