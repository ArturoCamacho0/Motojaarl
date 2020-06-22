<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Motojaarl</title>
        <link rel="stylesheet" type="text/css" href="../../styles/inicio.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" type="text/css" href="../../styles/formularios.css?v=<?php echo time(); ?>"/>
        <link rel="stylesheet" type="text/css" href="../../styles/consulta.css?v=<?php echo time(); ?>"/>
        <script type="text/javascript" src="../jquery-3.5.0.min.js"></script>
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
                        <li><a href="../clientes/consulta_1.php">Consultar</a></li>
                        <li><a href="../clientes/registro_1.php">Agregar</a></li>
                        <li><a href="../clientes/modificar_1.php">Modificar</a></li>
                        <li><a href="../clientes/borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li>Ventas
                    <ul class="submenu">
                        <li><a href="./mostrador_1.php">Mostrador</a></li>
                        <li><a href="./cliente_1.php">Cliente</a></li>
                        <li><a href="./consulta_1.php">Consultar</a></li>
                        <li><a href="./borrar_1.php">Eliminar</a></li>
                    </ul>
                </li>

                <li><a href="../cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </header>

        <!-- Contenido -->
        <section class="contenido">
            <h2>Venta de refacciones de mostrador</h2>
            <form class="consulta_form" method="POST" action="mostrador_2.php">
                <h3>Consulta por clave</h3>
                <label for="clave">Ingrese la clave del producto que desea buscar</label>
                <input type="text" name="clave"/>
                <input type="submit" value="Buscar"/>
            </form>

            <form class="consulta_form" method="POST" action="mostrador_2.php">
                <h3>Consulta por nombre</h3>
                <label for="nombre">Ingrese el nombre del producto que desea buscar</label>
                <input type="text" name="nombre" id="nombre"/>
                <input type="submit" value="Buscar"/>
            </form>
            <h3>Productos agregados a la venta</h3>

            <div id="venta_listado">
                <table class="consulta">
                    <tr class="cabecera_con">
                        <td>Clave</td>
                        <td>Nombre</td>
                        <td>Precio</td>
                    </tr>
                </table>
            </div>
            <form id="v" method="POST" action="mostrador_3.php">
                <input class="in re" type="text" name="refacciones"/>
                <input class="in" type="text" name="cliente" value="menudeo"/>
                <input class="in mo" type="text" name="monto"/>
                <input type="submit" id="acept" value="Aceptar"/>
            </form>


            <?php
                if(isset($_GET['ref'])){
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
                            $precio = (float)($mostrar['precio_compra'] * 0.20) + $mostrar['precio_compra'];
                            $c = (String)$mostrar['clave'];
                            $n = (String)$mostrar['nombre'];

                            if($mostrar){
                                echo "
                                <script type='text/javascript'>
                                    var clave = [];
                                    var nombre = [];
                                    var precio = [];
                                    var total = 0;
                                    var listado = [];
                                    
                                    var clave_local = localStorage.getItem('clave');
                                    clave.push(clave_local);
                                    clave.push('$c');
                                    localStorage.setItem('clave', clave);
                                    let clave_s = localStorage.getItem('clave');
                                    let clave_array = clave_s.split(',');

                                    var nombre_local = localStorage.getItem('nombre');
                                    nombre.push(nombre_local);
                                    nombre.push('$n');
                                    localStorage.setItem('nombre', nombre);
                                    let nombre_s = localStorage.getItem('nombre');
                                    let nombre_array = nombre_s.split(',');

                                    var precio_local = localStorage.getItem('precio');
                                    precio.push(precio_local);
                                    precio.push($precio);
                                    localStorage.setItem('precio', precio);
                                    let precio_s = localStorage.getItem('precio');
                                    let precio_array = precio_s.split(',');

                                    listado.push([clave_s, nombre_s, precio_s]);
                                    localStorage.setItem('listado', listado);
                                    let listado_s = localStorage.getItem('listado');

                                    var re = document.querySelector('.re');
                                    var fe = document.querySelector('.cl');
                                    var mo = document.querySelector('.mo');

                                    t = new Date();
                                    re.value = nombre_s;

                                    listado_array = listado_s.split(',');

                                    console.log(listado_array);

                                    if(localStorage.getItem('total')){
                                        total = parseInt(localStorage.getItem('total'));
                                        total += $precio;
                                        localStorage.setItem('total', total);
                                        mo.value = total;
                                    }else{
                                        localStorage.setItem('total', $precio);
                                        total = parseInt(localStorage.getItem('total'));
                                    }
                                    var div = document.querySelector('.consulta');
                                    var tr = document.createElement('tr');
                                    var td = document.createElement('td');

                                    for (i = 1; i < clave_array.length; i++) {
                                        var tr = document.createElement('tr');
                                        var td = document.createElement('td');

                                        td.append(clave_array[i]);
                                        tr.append(td);
                                        td = document.createElement('td');

                                        td.append(nombre_array[i]);
                                        tr.append(td);
                                        td = document.createElement('td');

                                        td.append('$' + precio_array[i]);
                                        tr.append(td);
                                        td = document.createElement('td');

                                        div.append(tr);
                                    }

                                    var d = document.createElement('div');
                                    d.append('TOTAL: $' + total)
                                    document.querySelector('#venta_listado').append(d);

                                    $('#v').submit(() => {
                                        localStorage.clear();
                                    });
                                </script>
                                ";
                            }
                        }
                    }else{
                        echo "  <script type='text/javascript'>
                                    alert('Error en la consulta');
                                    window.location.href='mostrador_1.php';
                                </script>";
                    }
                }else{
                    echo "<h4>No se ha agragado nada</h4>";
                }
            ?>
        </section>
    </body>
</html>