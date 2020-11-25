<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    require_once 'helpers.php';

    $nombreEmpresa = isset( $_POST['nombre_empresa'] ) ? mysqli_real_escape_string( $conexion, $_POST['nombre_empresa'] ) : '' ;
    $propietario = isset( $_POST['propietario'] ) ? mysqli_real_escape_string( $conexion, $_POST['propietario'] ) : '' ;
    $ubicacion = isset( $_POST['ubicacion'] ) ? mysqli_real_escape_string( $conexion, $_POST['ubicacion'] ) : '' ;
    $telefono = isset( $_POST['telefono'] ) ? mysqli_real_escape_string( $conexion, $_POST['telefono'] ) : '' ;
    $celular = isset( $_POST['celular'] ) ? mysqli_real_escape_string( $conexion, $_POST['celular'] ) : '' ;
    $distribuidor = isset( $_POST['distribuidor'] ) ? (INT) mysqli_real_escape_string( $conexion, $_POST['distribuidor'] )  : '' ;
    
    /*Tabla clientes*/
    $sqlClientes = "INSERT INTO clientes VALUES(NULL, '$nombreEmpresa', '$propietario', '$ubicacion', $telefono, '$celular', $distribuidor );";
    $saveClientes = mysqli_query( $conexion, $sqlClientes );
    if ( $saveClientes ) {
        header( 'Location: ../../dist/register_client.php' );
    }else{
        echo 'Error al guardar distribuidor'.'<br>';
        $e = mysqli_error($conexion);
        var_dump($e);
        die();

    }

}
?>