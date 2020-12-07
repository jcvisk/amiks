<?php

function getAllIncidents( $conexion){
    $sql = "SELECT distribuidores.nombre, incidencias.* 
    FROM incidencias
    INNER JOIN distribuidores
    ON incidencias.iddistribuidor = distribuidores.id;";
    $datos = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $datos && mysqli_num_rows( $datos ) >= 1 ) {
        $resultado = $datos;
    }

    return $resultado;
}


?>