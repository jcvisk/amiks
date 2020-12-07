<?php

//Devuelve todos los registros de una tabla
function getAllRecords( $conexion ) {
    $sql = "SELECT * FROM administradores WHERE status = 1";
    $datos = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $datos && mysqli_num_rows( $datos ) >= 1 ) {
        $resultado = $datos;
    }

    return $resultado;
}

?>