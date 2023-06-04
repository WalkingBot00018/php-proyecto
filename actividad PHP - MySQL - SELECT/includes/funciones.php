<?php

function Buscar_usuarios(){

    try{
        require 'database.php';
        $sql='SELECT * FROM usuario;';

        $consultar=mysqli_query($db, $sql);

        return $consultar;
        
    }

    catch(\Throwable $th){
        echo('<pre>');
        var_dump($th);
        echo('<\pre>');
    }
}

function conectar_db(){
    $db=mysqli_connect('127.0.0.1:3308', 'root', '', 'lodging3.0');
    if(!$db){
        'No se pudo conectar a la base de datos';
        exit;
    }
    return $db;
}