<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    require_once 'helpers.php';
    $id = isset( $_POST['id'] ) ? (INT)mysqli_real_escape_string( $conexion, $_POST['id'] ) : '' ;
    $nombreEmpresa = isset( $_POST['nombre_empresa'] ) ? mysqli_real_escape_string( $conexion, $_POST['nombre_empresa'] ) : '' ;
    $propietario = isset( $_POST['propietario'] ) ? mysqli_real_escape_string( $conexion, $_POST['propietario'] ) : '' ;
    $ubicacion = isset( $_POST['ubicacion'] ) ? mysqli_real_escape_string( $conexion, $_POST['ubicacion'] ) : '' ;
    $telefono = isset( $_POST['telefono'] ) ? mysqli_real_escape_string( $conexion, $_POST['telefono'] ) : '' ;
    $celular = isset( $_POST['celular'] ) ? mysqli_real_escape_string( $conexion, $_POST['celular'] ) : '' ;
    $distribuidor = isset( $_POST['distribuidor'] ) ? (INT) mysqli_real_escape_string( $conexion, $_POST['distribuidor'] )  : '' ;
    //echo $id.' '.$nombreEmpresa.' '.$propietario.' '.$ubicacion.' '.$telefono.' '.$celular.' '.$distribuidor; die();
    /*Tabla clientes*/

    if($nombreEmpresa != ''){
        $sqlClientes = "UPDATE clientes SET nombreempresa='$nombreEmpresa' WHERE id = $id;";
        $saveClientes = mysqli_query( $conexion, $sqlClientes );
        if ( !$saveClientes ) {
            echo 'Error al actualizar cliente en nombreempresa'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($propietario){
        $sqlClientes = "UPDATE clientes SET propietario='$propietario' WHERE id = $id;";
        $saveClientes = mysqli_query( $conexion, $sqlClientes );
        if ( !$saveClientes ) {
            echo 'Error al actualizar cliente en propietario'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($ubicacion){
        $sqlClientes = "UPDATE clientes SET ubicacion='$ubicacion' WHERE id = $id;";
        $saveClientes = mysqli_query( $conexion, $sqlClientes );
        if ( !$saveClientes ) {
            echo 'Error al actualizar cliente en ubicacion'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($telefono){
        $sqlClientes = "UPDATE clientes SET telefono='$telefono' WHERE id = $id;";
        $saveClientes = mysqli_query( $conexion, $sqlClientes );
        if ( !$saveClientes ) {
            echo 'Error al actualizar cliente en telefono'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($celular){
        $sqlClientes = "UPDATE clientes SET celular='$celular' WHERE id = $id;";
        $saveClientes = mysqli_query( $conexion, $sqlClientes );
        if ( !$saveClientes ) {
            echo 'Error al actualizar cliente en celular'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }
    if($distribuidor){
        $sqlClientes = "UPDATE clientes SET  iddistribuidor=$distribuidor WHERE id = $id;";
        $saveClientes = mysqli_query( $conexion, $sqlClientes );
        if ( !$saveClientes ) {
            echo 'Error al actualizar cliente en iddistribuidor'.'<br>';
            $e = mysqli_error($conexion);
            var_dump($e);
            die();
        }
    }

    header( 'Location: ../../dist/register_client.php' );
}
?>