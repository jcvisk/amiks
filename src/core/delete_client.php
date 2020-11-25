<?php

    require_once 'conexion.php';
    $id = isset($_GET['id']) ? (INT)$_GET['id'] : '';

    //comporbar las credenciales del ususario
    $sql = "SELECT * FROM clientes where id = $id ";
    $client = mysqli_query($conexion, $sql);
    echo 'pasando la busqueda'.'<br>';

    if ($client && mysqli_num_rows($client) == 1){
        echo 'entrando al if'.'<br>';
        
        $sqlDelete = "DELETE FROM clientes where id = $id; ";
        $delete = mysqli_query($conexion, $sqlDelete);
        echo 'pasando el delete'.'<br>';
        $e = mysqli_error($conexion);
        var_dump($e);
        if($delete){
            header( 'Location: ../../dist/register_client.php' );
        }
    }else{
        echo 'error al eliminar cliente'; die();
        header( 'Location: ../../dist/register_client.php' );
    }



?>