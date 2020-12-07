<?php

/*  REGISTRO DE VENTAS */

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

function listarClientesVentas( $conexion, $iddistribuidor ) {
    $sql = "SELECT ventas.*, clientes.nombreempresa, productos.descripcion  
    FROM ventas, productos, clientes 
    WHERE ventas.idcliente = clientes.id
    AND ventas.idproducto = productos.id
    AND ventas.iddistribuidor = $iddistribuidor;";
    $clientes = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $clientes && mysqli_num_rows( $clientes ) >= 1 ) {
        $resultado = $clientes;
    }

    return $resultado;
}

function obtenerRegistro( $conexion, $tabla, $id, $idforeaneo ) {
    $sql = "SELECT * FROM $tabla WHERE $id = $idforeaneo AND status = 1;";
    $distribuidores = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $distribuidores && mysqli_num_rows( $distribuidores ) >= 1 ) {
        $resultado = $distribuidores;
    }

    return $resultado;
}
/*  VENTAS */
function listarVentasAllData( $conexion ) {
    $sql = "SELECT ventas.*, clientes.*, productos.*, distribuidores.*
    FROM ventas 
    INNER JOIN clientes
    ON ventas.idcliente = clientes.id
    INNER JOIN productos
    ON ventas.idproducto = productos.id
    INNER JOIN distribuidores
    ON ventas.iddistribuidor = distribuidores.id;";
    $clientes = mysqli_query( $conexion, $sql );

    $resultado = array();
    if ( $clientes && mysqli_num_rows( $clientes ) >= 1 ) {
        $resultado = $clientes;
    }

    return $resultado;
}
?>