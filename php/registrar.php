<?php
    $resultado = null;
    if(isset($_POST['formulario']))
    {
        require('conexion.php');
        echo "hasta aqui bien";
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $promocion = $_POST['promocion'];
        $grado = $_POST['grado'];
        $especialidad = $_POST['especialidad'];
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

        $insertar_registro = "INSERT INTO promocion_2022 (nombre, correo, grado, especialidad, foto) VALUES ('$nombre', '$correo', '$grado', '$especialidad', '$tmp_name')";

        $respuesta = mysqli_query($conexion, $insertar_registro) or trigger_error("Error en la consulta MySQL: ".mysqli_error($conexion));

        if($respuesta)
        {
            echo 'Registro grabado';
        }
        else
        {
            echo 'No se ha GRABADO el registro';
        }
    }
?>