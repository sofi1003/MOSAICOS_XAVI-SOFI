<?php 
 DEFINE('USER', 'root');
 DEFINE('PW', '');
 DEFINE('HOST', 'localhost');
 DEFINE('BD', 'MOSAICOS');

 //Conexion a la BD
 $conexion = mysqli_connect(HOST, USER, PW, BD);
 if($conexion)
 {
    echo 'SE  HA CONECTADO EL SERVIDOR MYSQL, BD LISTA PARA USAR <br>';

 }
 else{
    echo 'No se pudo conectar al servidor MySQL <br>';
 }
?>