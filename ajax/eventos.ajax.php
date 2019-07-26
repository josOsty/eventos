<?php

require_once "../controladores/eventos.controlador.php";
require_once "../modelos/eventos.modelo.php";

class AjaxEventos{

	/*=============================================
	EDITAR EVENTO
	=============================================*/	

	public $idEvento;

	public function ajaxEditarEvento(){

		$item = "id";
		$valor = $this->idEvento;

		$respuesta = ControladorEventos::ctrMostrarEventos($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarEvento;
	public $activarId;


	public function ajaxActivarEvento(){

		$tabla = "eventos";

		$item1 = "estado";
		$valor1 = $this->activarEvento;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloEventos::mdlActualizarEvento($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR USUARIO
	=============================================*/	

	public $validarEvento;

	public function ajaxValidarEvento(){

		$item = "evento";
		$valor = $this->validarEvento;

		$respuesta = ControladorEventos::ctrMostrarEventos($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idEvento"])){

	$editar = new AjaxEventos();
	$editar -> idEvento = $_POST["idEvento"];
	$editar -> ajaxEditarEvento();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxUsuarios();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarUsuario"])){

	$valUsuario = new AjaxUsuarios();
	$valUsuario -> validarUsuario = $_POST["validarUsuario"];
	$valUsuario -> ajaxValidarUsuario();

}