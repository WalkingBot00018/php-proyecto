<?php

function conectar_db(){
    $db=mysqli_connect('127.0.0.1:3308', 'root', '', 'lodging3.0');
    if(!$db){
        'No se encontro con la base de datos';
        exit;
    }else{
        echo 'Conexion exitosa';
    }
    return $db;
}