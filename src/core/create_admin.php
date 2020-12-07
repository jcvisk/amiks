<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';

    $nombre = isset( $_POST['nombre'] ) ? mysqli_real_escape_string( $conexion, $_POST['nombre'] ) : '' ;
    $apellido = isset( $_POST['apellido'] ) ? mysqli_real_escape_string( $conexion, $_POST['apellido'] ) : '' ;
    $correo = isset( $_POST['correo'] ) ? trim(mysqli_real_escape_string( $conexion, $_POST['correo'] )) : '' ;
    $password = isset( $_POST['password'] ) ? mysqli_real_escape_string( $conexion, $_POST['password'] ) : '' ;

    $encrypted_password = password_hash( $password, PASSWORD_BCRYPT, ['cost'=>4] );


    $sql = "INSERT INTO administradores VALUES(NULL, '$nombre', '$apellido', '$correo', '$encrypted_password', 1);";
    $save = mysqli_query( $conexion, $sql );
    if ( $save ) {
        header('Location: ../../dist/register_admin.php');
    } else {
        echo 'Error al guardar admin'.'<br>';
        $e = mysqli_error( $conexion );
        var_dump( $e );
        die();

    }
}



?>