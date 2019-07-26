<?php

require_once "controladores/plantilla.controlador.php";/////llama a los controladores
require_once "controladores/usuarios.controlador.php";//controlador de usuario
require_once "controladores/cargos.controlador.php";//controlador de roles 
require_once "controladores/departamentos.controlador.php";//carreras 
require_once "controladores/personal.controlador.php";// paricupoantes 
require_once "controladores/asistencia.controlador.php";//ventana de confirmacion 
require_once "controladores/eventos.controlador.php";//// eventos

//modelos base de datos 

require_once "modelos/usuarios.modelo.php";//
require_once "modelos/cargos.modelo.php";//
require_once "modelos/departamentos.modelo.php";//
require_once "modelos/personal.modelo.php";
require_once "modelos/asistencia.modelo.php";
require_once "modelos/eventos.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla->ctrPlantilla();
