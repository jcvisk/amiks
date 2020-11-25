<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    require_once 'helpers.php';

    $nombre = isset( $_POST['nombre'] ) ? mysqli_real_escape_string( $conexion, $_POST['nombre'] ) : '' ;
    $apellido = isset( $_POST['apellido'] ) ? mysqli_real_escape_string( $conexion, $_POST['apellido'] ) : '' ;
    $edad = isset( $_POST['edad'] ) ? (INT) mysqli_real_escape_string( $conexion, $_POST['edad'] ) : '' ;
    $celular = isset( $_POST['celular'] ) ? mysqli_real_escape_string( $conexion, $_POST['celular'] ) : '' ;
    $correo = isset( $_POST['correo'] ) ? trim( mysqli_real_escape_string( $conexion, $_POST['correo'] ) ) : '' ;
    $password = isset( $_POST['password'] ) ? mysqli_real_escape_string( $conexion, $_POST['password'] ) : '' ;
    $licencia = isset( $_POST['licencia'] ) ? mysqli_real_escape_string( $conexion, $_POST['licencia'] ) : '' ;
    $administrador = isset($_SESSION['usuario_admin']) ? (INT)$_SESSION['usuario_admin']['id'] : '' ;
    $encrypted_password = password_hash( $password, PASSWORD_BCRYPT, ['cost'=>4] );

    /*Tabla distribuidores*/
    $sqlDisrtribuidores = "INSERT INTO distribuidores VALUES(NULL, '$nombre', '$apellido', '$celular', $edad, '$correo', '$encrypted_password', '$licencia', $administrador);";
    $saveDisrtribuidores = mysqli_query( $conexion, $sqlDisrtribuidores );
    if ( $saveDisrtribuidores ) {
        header( 'Location: ../../dist/register_distribuitor.php' );
    }else{
        echo 'Error al guardar distribuidor'.'<br>';
        $e = mysqli_error($conexion);
        var_dump($e);
        die();

    }

}
?>