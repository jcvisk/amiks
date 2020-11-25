<?php

session_start();

if ( isset( $_SESSION['usuario_admin'] ) ) {
    session_destroy();
}

if ( isset( $_SESSION['usuario_distribuidor'] ) ) {
    session_destroy();
}
header( 'Location: ../../dist/login.php' );

?>