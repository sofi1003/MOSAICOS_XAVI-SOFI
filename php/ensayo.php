<?php
    $resultado = null;
    if(isset($_POST['formulario']))
    {
        require('conexion.php');
        $foto = $_FILES['imagensubida'] ['name'];
        $tmp_name = $_FILES['imagensubida'] ['tmp_name'];
        $error = $_FILES['imagensubida'] ['error'];
        $type = $_FILES['imagensubida'] ['type'];
        if ($error){
            $resultado= 'Ha ocurrido un error';
        }
        else{
            $ruta = 'files/'.$foto;
            move_uploaded_file($tmp_name, $ruta);
            $resultado = "La imagen '$foto' ha sido guardada exitosamente";

        }
        echo $resultado;

    }
?>