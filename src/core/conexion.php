<?php
//DATOS PARA LA CONEXION
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'amiks';

//CONECTAR LA BASE DE DATOS
$conexion = mysqli_connect($host, $user, $password, $database); 

//COMPROBAR SI LA CONEXION SE REALIZÓ CORRECTAMENTE
/*
if (mysqli_connect_errno()){
    echo 'La conexión a la DataBase de MySQL ha fallado '.mysqli_connect_errno();
}else{
    echo 'Conexion exitosa';
}*/

//CONFIGURAR LA CODIFICACION DE CARACTERES
mysqli_query($conexion, "SET NAMES 'UTF8'");

session_start();
?>