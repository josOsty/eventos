<?php

class ControladorAsistencia
{

    /*=============================================
    MOSTRAR ASISTENCIA
    =============================================*/

    public static function ctrMostrarAsistencia($item, $valor, $item2, $valor2)
    {

        $tabla = "asistencia";

        $respuesta = ModeloAsistencias::mdlMostrarAsistencias($tabla, $item, $valor, $item2, $valor2);

        return $respuesta;

    }

    /*=============================================
    MOSTRAR ASISTENCIA GENERAL
    =============================================*/

    public static function ctrMostrarAsistenciaGeneral($item, $valor, $item2, $valor2)
    {

        $tabla = "asistencia_mensual";

        $respuesta = ModeloAsistencias::mdlMostrarAsistenciaGeneral($tabla, $item, $valor, $item2, $valor2);

        return $respuesta;

    }

}
