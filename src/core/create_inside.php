<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    require_once 'helpers.php';

    $titulo = isset( $_POST['titulo'] ) ? mysqli_real_escape_string( $conexion, $_POST['titulo'] ) : '' ;
    $fecha = isset( $_POST['fecha'] ) ? mysqli_real_escape_string( $conexion, $_POST['fecha'] ) : '' ;
    $mensaje = isset( $_POST['mensaje'] ) ? mysqli_real_escape_string( $conexion, $_POST['mensaje'] ) : '' ;
    $iddistribuidor = isset( $_POST['id'] ) ? mysqli_real_escape_string( $conexion, $_POST['id'] ) : '' ;

    /*Tabla clientes*/
    $sqlProductos = "INSERT INTO incidencias VALUES(NULL, '$titulo', '$fecha', '$mensaje', $iddistribuidor);";
    $saveProductos = mysqli_query( $conexion, $sqlProductos );
    if ( $saveProductos ) {
        header( 'Location: ../../dist/inside_case_report.php' );
    } else {
        echo 'Error al guardar el reporte de incidencia'.'<br>';
        $e = mysqli_error( $conexion );
        var_dump( $e );
        die();

    }

}
?>