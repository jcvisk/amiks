<?php
if ( isset( $_GET ) ) {
    require_once 'conexion.php';

    $id = isset( $_GET['id'] ) ? (INT)mysqli_real_escape_string( $conexion, $_GET['id'] ) : '' ;

    /*Tabla eliminar*/
    $sqlDelete = "UPDATE productos SET status = 2 WHERE id = $id;";
    $saveDelete = mysqli_query( $conexion, $sqlDelete );
    if ( $saveDelete ) {
        header( 'Location: ../../dist/create_produts.php' );
    }else{
        echo 'Error al eliminar producto'.'<br>';
        $e = mysqli_error($conexion);
        var_dump($e);
        die();

    }

}
?>