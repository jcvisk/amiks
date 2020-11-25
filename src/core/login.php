<?php

if ( isset( $_POST ) ) {
    require_once 'conexion.php';

    $usuario = isset( $_POST['usuario'] ) ? trim( $_POST['usuario'] ) : false;
    $password = isset( $_POST['password'] ) ? $_POST['password'] : false;
    
    //comporbar las credenciales del ususario
    $sql = "SELECT * FROM administradores where correo = '$usuario'";
    $login = mysqli_query( $conexion, $sql );

    if ( $login && mysqli_num_rows( $login ) == 1 ) {
        $usuario = mysqli_fetch_assoc( $login );

        //comprobar contraseña

        $verify = password_verify( $password, $usuario['password'] );

        if ( $verify ) {
            //crear una sesion para decir que el ususario esta logueado
            $_SESSION['usuario_admin'] = $usuario;
            header( 'Location: ../../dist/index.php' );
            //en caso de que se haya creado un error de sesion, borrarla
            if ( isset( $_SESSION['error_login'] ) ) {
                session_unset();
            }
        } else {
            //sesion fallida
            $_SESSION['error_login'] = "<small class='form-text text-danger'>Contraseña incorrecta</small>";
            header( 'Location: ../../dist/login.php' );
        }
    } else {

        //comporbar las credenciales del ususario
        $sql = "SELECT * FROM distribuidores where correo = '$usuario'";
        $login = mysqli_query( $conexion, $sql );

        if ( $login && mysqli_num_rows( $login ) == 1 ) {
            $usuario = mysqli_fetch_assoc( $login );

            //comprobar contraseña

            $verify = password_verify( $password, $usuario['password'] );

            if ( $verify ) {
                //crear una sesion para decir que el ususario esta logueado
                $_SESSION['usuario_distribuidor'] = $usuario;
                header( 'Location: ../../dist/dashboard.php' );
                //en caso de que se haya creado un error de sesion, borrarla
                if ( isset( $_SESSION['error_login'] ) ) {
                    session_unset();
                }
            } else {
                //sesion fallida
                $_SESSION['error_login'] = "<small class='form-text text-danger'>Contraseña incorrecta</small>";
                header( 'Location: ../../dist/login.php' );
            }
        } else {
            $_SESSION['error_login'] = "<small class='form-text text-danger'>El usuario no existe</small>";
            header( 'Location: ../../dist/login.php' );
        }
    }

}

?>