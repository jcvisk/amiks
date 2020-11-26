<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    require_once 'helpers.php';

    $descripcion = isset( $_POST['presentacion'] ) ? mysqli_real_escape_string( $conexion, $_POST['presentacion'] ) : '' ;
    $precioBase = isset( $_POST['precioBase'] ) ? (DOUBLE)mysqli_real_escape_string( $conexion, $_POST['precioBase'] ) : '' ;
    $precioVenta = isset( $_POST['precioVenta'] ) ? (DOUBLE)mysqli_real_escape_string( $conexion, $_POST['precioVenta'] ) : '' ;

    /*Tabla clientes*/
    $sqlProductos = "INSERT INTO productos VALUES(NULL, '$descripcion', $precioBase, $precioVenta, 1);";
    $saveProductos = mysqli_query( $conexion, $sqlProductos );
    if ( $saveProductos ) {
        header( 'Location: ../../dist/create_produts.php' );
    } else {
        echo 'Error al guardar el producto'.'<br>';
        $e = mysqli_error( $conexion );
        var_dump( $e );
        die();

    }

}
?>