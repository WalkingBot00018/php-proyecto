<?php

function Buscar_empleados(){

    try{
        require 'database-empleado.php';
        $sql='SELECT * FROM empleado;';

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
        'No se pudo conectar con la bace de datos';
        exit;
    }
    return $db;
}