<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    require_once 'helpers.php';

    $pagada = isset( $_POST['pagadas'] ) ? ( INT )mysqli_real_escape_string( $conexion, $_POST['pagadas'] ) : '' ;
    $vendida = isset( $_POST['vendidas'] ) ? ( INT )mysqli_real_escape_string( $conexion, $_POST['vendidas'] ) : '' ;
    $cambio = isset( $_POST['cambios'] ) ? ( INT )mysqli_real_escape_string( $conexion, $_POST['cambios'] ) : '' ;
    $consigna = isset( $_POST['consignas'] ) ? ( INT )mysqli_real_escape_string( $conexion, $_POST['consignas'] ) : '' ;
    $consignaAnterior = isset( $_POST['consigna_anterior'] ) ? ( INT )mysqli_real_escape_string( $conexion, $_POST['consigna_anterior'] ) : '' ;
    $distribuidor = isset( $_POST['distribuidor'] ) ? ( INT ) mysqli_real_escape_string( $conexion, $_POST['distribuidor'] )  : '' ;
    $producto = isset( $_POST['presentacion'] ) ? ( INT ) mysqli_real_escape_string( $conexion, $_POST['presentacion'] ) : '' ;
    $cliente = isset( $_POST['cliente'] ) ? ( INT ) mysqli_real_escape_string( $conexion, $_POST['cliente'] ) : '' ;

    /*Tabla Ventas*/
    $sqlVentas = "INSERT INTO ventas VALUES(NULL, $pagada, $vendida, $cambio, $consigna, $consignaAnterior, 1, $distribuidor, $producto, $cliente );";

    $saveVentas = mysqli_query( $conexion, $sqlVentas );
    if ( $saveVentas ) {
        header( 'Location: ../../dist/register_sale.php' );
    } else {
        echo 'Error al guardar venta'.'<br>';
        $e = mysqli_error( $conexion );
        var_dump( $e );
        die();

    }

}
?>