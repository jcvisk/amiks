<?php

function borrarErrores() {
    if ( isset( $_SESSION['errores'] ) ) {
        $_SESSION['errores'] = null;
    }
    if ( isset( $_SESSION['error_login'] ) ) {
        $_SESSION['error_login'] = null;
    }
}
//mostrar la lista de los distribuidores

function obtenerRegistros( $conexion, $tabla ) {
    $sql = "SELECT * FROM $tabla ";
    $distribuidores = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $distribuidores && mysqli_num_rows( $distribuidores ) >= 1 ) {
        $resultado = $distribuidores;
    }

    return $resultado;
}
//mostrar la los registros com un where

function obtenerRegistro( $conexion, $tabla, $id, $idforeaneo ) {
    $sql = "SELECT * FROM $tabla WHERE $id = $idforeaneo;";
    $distribuidores = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $distribuidores && mysqli_num_rows( $distribuidores ) >= 1 ) {
        $resultado = $distribuidores;
    }

    return $resultado;
}
//mostrar la los registros pertenecientes a un distribuidor

function listarClientesVentas( $conexion ) {
    $sql = "SELECT ventas.*,
    clientes.nombreempresa,
    productos.descripcion
    FROM ventas INNER JOIN clientes
    ON ventas.idcliente = clientes.id
    INNER JOIN productos
    ON ventas.idproducto = productos.id;";
    $clientes = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $clientes && mysqli_num_rows( $clientes ) >= 1 ) {
        $resultado = $clientes;
    }

    return $resultado;
}

?>