<?php
if ( isset( $_POST ) ) {
    require_once 'conexion.php';
    require_once 'helpers.php';

    $id = isset( $_POST['id'] ) ? mysqli_real_escape_string( $conexion, $_POST['id'] ) : '' ;
    $descripcion = isset( $_POST['presentacion'] ) ? mysqli_real_escape_string( $conexion, $_POST['presentacion'] ) : '' ;
    $precioBase = isset( $_POST['precioBase'] ) ? (DOUBLE)mysqli_real_escape_string( $conexion, $_POST['precioBase'] ) : '' ;
    $precioVenta = isset( $_POST['precioVenta'] ) ? (DOUBLE)mysqli_real_escape_string( $conexion, $_POST['precioVenta'] ) : '' ;

    if($descripcion != ''){
        $sqlProducts = "UPDATE productos SET  descripcion='$descripcion' WHERE id = $id;";
        $saveProductos = mysqli_query( $conexion, $sqlProducts );
        if ( !$saveProductos ) {
            echo 'Error al actualizar el producto en descripcion'.'<br>';
            $e = mysqli_error( $conexion );
            var_dump( $e );
            die();
        }
    }
    if($precioBase != ''){
        $sqlProducts = "UPDATE productos SET  precioBase=$precioBase WHERE id = $id;";
        $saveProductos = mysqli_query( $conexion, $sqlProducts );
        if ( !$saveProductos ) {
            echo 'Error al actualizar el producto en precioBase'.'<br>';
            $e = mysqli_error( $conexion );
            var_dump( $e );
            die();
        }
    }
    if($precioVenta != ''){
        $sqlProducts = "UPDATE productos SET  precioVenta=$precioVenta WHERE id = $id;";
        $saveProductos = mysqli_query( $conexion, $sqlProducts );
        if ( !$saveProductos ) {
            echo 'Error al actualizar el producto en precioVenta'.'<br>';
            $e = mysqli_error( $conexion );
            var_dump( $e );
            die();
        }
    }

        header( 'Location: ../../dist/create_produts.php' );

}
?>