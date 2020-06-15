<?php
    require '../conexion.php';
    $clave = $_POST['clave'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_compra = $_POST['precio_compra'];
    $imagen = $_POST['imagen'];
    $tipo = $_POST['tipo'];
    $existencia = $_POST['existencia'];

    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        echo "Connected successfully\n";
    }

    $modificar = "UPDATE refacciones 
                  SET nombre = '$nombre', descripcion = '$descripcion', precio_compra = $precio_compra, imagen = '$imagen', tipo = '$tipo', existencia = $existencia
                  WHERE clave = '$clave';";

    try{
        $sql = mysqli_query($conexion, $modificar);
    }catch(Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }

    if($nombre == '' || $nombre == null || $descripcion == '' || $precio_compra == null || $tipo == 'Seleccione el tipo de refacción' || $existencia == '' || $existencia == null){
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