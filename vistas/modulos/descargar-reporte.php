<?php

require_once "../../controladores/ventas.controlador.php";
require_once "../../modelos/ventas.modelo.php";
require_once "../../controladores/clientes.controlador.php";
require_once "../../modelos/clientes.modelo.php";
require_once "../../controladores/usuarios.controlador.php";
require_once "../../modelos/usuarios.modelo.php";
require_once "../../modelos/eventos.modelo.php";
require_once "../../modelos/eventos.controlador.php";

$reporte = new ControladorVentas();
$reporte -> ctrDescargarReporte();