<?php
session_start();

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$_SESSION['usuario'] = $usuario;

// Conectar la base de datos
$conexion = mysqli_connect("localhost", "root", "", "motojaarl");

$consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' and contrasena = '$password'";
$resultado = mysqli_query($conexion, $consulta);
$filas = mysqli_num_rows($resultado);

if($filas > 0){
    header("location: inicio.php");
}else if($usuario == null || $usuario == '' || $password == null || $password == ''){
    echo "  <script type='text/javascript'>
                alert('Campos vacios');
                window.location.href='../index.html';
            </script>";
}else{
    echo "  <script type='text/javascript'>
                alert('Usuario incorrecto');
                window.location.href='../index.html';
            </script>";
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>