<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="css/estilos.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
	<title>Formularios</title>
</head>
<body>
	<div class="contenedor-formulario">
		<div class="wrap">
			<form action="registro.php" enctype="multipart/form-data" class="formulario" name="formulario_registro" method="post">
				<div>
					<div class="input-group">
						<input type="text" id="nombre" name="nombre">
						<label class="label" for="nombre">Nombre Completo</label>
					</div>
					<div class="input-group">
						<input type="email" id="correo" name="correo">
						<label class="label" for="correo">Correo</label>
					</div>
					<div class="input-group">
						<input type="text" id="nombre" name="nombre">
						<label class="label" for="nombre">Promoción a la que pertenece</label>
					</div>
                        <div class="input-group">
                            <input type="text" id="nombre" name="grado">
                            <label class="label" for="pass">Grado</label>
                        </div>
                        <div class="input-group">
                            <input type="text" id="pass" name="especialidad">
                            <label class="label" for="pass">Especialidad</label>
                        </div>
                       
							<input type="file" name="imagensubida" accept="image/png, .jpeg, .jpg, image/gif">    
							
							<input type="hidden" name="formulario">
							<input type="submit" id="btn-submit" value="enviar">
				</div>
			</form>
		</div>
	</div>
    
	<script src="js/formulario.js"></script>
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

		echo "LA  RUTA  ES";
		echo $tmp_name;
        if ($error){
            $resultado= 'Ha ocurrido un error';
        }
        else{
            $ruta = 'files/'.$tmp_name;
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
	
    
</body>
</html>