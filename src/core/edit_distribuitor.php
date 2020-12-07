<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';

    $id = isset( $_POST['id'] ) ? (INT)mysqli_real_escape_string( $conexion, $_POST['id'] ) : '' ;
    $nombre = isset( $_POST['nombre'] ) ? mysqli_real_escape_string( $conexion, $_POST['nombre'] ) : '' ;
    $apellido = isset( $_POST['apellido'] ) ? mysqli_real_escape_string( $conexion, $_POST['apellido'] ) : '' ;
    $edad = isset( $_POST['edad'] ) ? (INT) mysqli_real_escape_string( $conexion, $_POST['edad'] ) : '' ;
    $celular = isset( $_POST['celular'] ) ? mysqli_real_escape_string( $conexion, $_POST['celular'] ) : '' ;
    $licencia = isset( $_POST['licencia'] ) ? mysqli_real_escape_string( $conexion, $_POST['licencia'] ) : '' ;
    
    if($nombre != ''){
        $sqlDistribuidores = "UPDATE distribuidores SET nombre='$nombre' WHERE id = $id;";
        $saveDistribuidor = mysqli_query( $conexion, $sqlDistribuidores );
        if ( !$saveDistribuidor ) {
            echo 'Error al actualizar distribuidor en nombre'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($apellido  != ''){
        $sqlDistribuidores = "UPDATE distribuidores SET apellido='$apellido' WHERE id = $id;";
        $saveDistribuidor = mysqli_query( $conexion, $sqlDistribuidores );
        if ( !$saveDistribuidor ) {
            echo 'Error al actualizar distribuidor en apellido'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($edad  != ''){
        $sqlDistribuidores = "UPDATE distribuidores SET edad='$edad' WHERE id = $id;";
        $saveDistribuidor = mysqli_query( $conexion, $sqlDistribuidores );
        if ( !$saveDistribuidor ) {
            echo 'Error al actualizar distribuidor en edad'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($celular  != ''){
        $sqlDistribuidores = "UPDATE distribuidores SET celular='$celular' WHERE id = $id;";
        $saveDistribuidor = mysqli_query( $conexion, $sqlDistribuidores );
        if ( !$saveDistribuidor ) {
            echo 'Error al actualizar distribuidor en celular'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($licencia  != ''){
        $sqlDistribuidores = "UPDATE distribuidores SET licencia='$licencia' WHERE id = $id;";
        $saveDistribuidor = mysqli_query( $conexion, $sqlDistribuidores );
        if ( !$saveDistribuidor ) {
            echo 'Error al actualizar distribuidor en licencia'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }

    header( 'Location: ../../dist/register_distribuitor.php' );
}