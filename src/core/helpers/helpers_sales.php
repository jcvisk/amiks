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

function getTotales( $conexion, $idproducto, $iddistribuidor ) {
    $sql = "SELECT ventas.idproducto FROM ventas WHERE idproducto = $idproducto;";
    $consulta = mysqli_query( $conexion, $sql );
    if ( $consulta && mysqli_num_rows( $consulta ) >= 1 ) {
        $sql = "SELECT SUM(pagada), SUM(vendida) FROM ventas WHERE idproducto = $idproducto AND iddistribuidor = $iddistribuidor;";
        $datos = mysqli_query( $conexion, $sql );

        if ( $datos && mysqli_num_rows( $datos ) >= 1 ) {

            $arrayDatos = mysqli_fetch_row( $datos );

            $resultado = $arrayDatos[0] + $arrayDatos[1];
        }
    } else {
        $resultado = 0;
    }

    return $resultado;
}
?>