<?php

//Devuelve todos los registros de una tabla
function getAllRecords( $conexion, $tabla ) {
    $sql = "SELECT * FROM $tabla WHERE status = 1";
    $datos = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $datos && mysqli_num_rows( $datos ) >= 1 ) {
        $resultado = $datos;
    }

    return $resultado;
}

function getTotales($conexion, $id){
    $sql = "SELECT ventas.pagada, ventas.vendida FROM ventas WHERE idproducto = $id;";
    $datos = mysqli_query( $conexion, $sql );

    if ( $datos && mysqli_num_rows( $datos ) >= 1 ) {

        $arrayDatos = mysqli_fetch_row($datos);

        var_dump( $arrayDatos); die();

         $resultado = $arrayDatos[0] + $arrayDatos[1];
    }

    return $resultado;
}
?>