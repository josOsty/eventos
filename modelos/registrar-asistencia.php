 <?php

require_once "conexion.php";

@$cedula = $_POST['cedula'];
@$evento = $_POST['evento'];

//buscamos si el numero de cedula esta registrado en la base de datos
$sql_usuario   = Conexion::conectar()->query("SELECT * from personal where cedula = '" . $cedula . "' ");
$array_usuario = $sql_usuario->fetch(PDO::FETCH_ASSOC);

$sql_rol   = Conexion::conectar()->query("SELECT c.cargo from personal p inner join cargos c on p.id_cargo=c.id  ");
$array_rol = $sql_rol->fetch(PDO::FETCH_ASSOC);


$sql_rol   = Conexion::conectar()->query("SELECT * from personal p inner join asistencia a on p.id=a.id_personal
inner join eventos e on e.id=a.id_evento  ");
$array_rol = $sql_rol->fetch(PDO::FETCH_ASSOC);
//Si no esta registrado mostramos el siguiente mensaje (El numero de cedula no esta registrado)
if ($array_usuario['id'] == "") {

    $error[] = "Usted no se encuentra registrado.";

    //Si esta registrado capturamos la id del empleado
} else {
    $usuario  = $array_usuario['id'];
    $empleado = $array_usuario['nombres'] . " " . $array_usuario['apellidos'];

    // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
    date_default_timezone_set('America/Los_Angeles');
    $fecha = date("Y-m-d");
    $dia   = date("d");
    $mes   = date("m");
    $anio  = date("Y");
    //buscamos si el empleado se logueo en la fecha actual
    $busqueda_entrada = Conexion::conectar()->query("SELECT * from asistencia where id_personal = '$usuario' and fecha = '$fecha'");
	$numer = $busqueda_entrada->rowCount();  
    $array_he         = $busqueda_entrada->fetch();
	
	
	if(@$numer == 0){
	
	$sql_asistencia = Conexion::conectar()->query("INSERT into asistencia (id_personal,fecha,id_evento) values ('$usuario',now()   ,'$evento' )");
	
}

   
    //Si todas las horas estan registradas, las mostramos en el siguiente mensaje
    
        //buscamos la hora de entrada y salida del empleado
        $sql_reporte   = Conexion::conectar()->query("select * from asistencia where id_personal = '" . $usuario . "' and fecha = '$fecha'  ");
        $array_reporte = $sql_reporte->fetch(PDO::FETCH_ASSOC);
        if ($array_reporte['id_evento'] ) {
            ?>
                           <div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong style="text-transform:uppercase; text-align: center;"><?php echo $empleado ?></strong>
                        <br />
						   <?php
echo  "---PARTICIPACION CONFIRMADA ------";
            echo "</br>";


        }

        ?>
				</div>
				<?php

    }



//FIN ELSE  
    
	
	
	//MENSAJE CUANDO EL NUMERO DE CEDULA NO ESTÁ REGISTRADO
	
	if (isset($error)) {

    ?>
		<div class="alert alert-danger" role="alert">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php
       foreach ($error as $error) {
       echo $error;
    }
    ?>
		</div>
	<?php
}



?>