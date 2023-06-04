<?php
//1. Consultar una tabla de la base de datos
//Crear la función gestionar_bd()
require 'database.php';
function obtener_clientes($db){

    //TRY-CATCH se usa para vigilar un codigo en caso de error:
    //En TRY viene la ejecución que se vigila, en caso de error se ejecuta el CATCH
    try{   
        //2. Escribir la consulta o query SQL
        $sql = "SELECT * FROM cliente;";

        //Hacer la consulta
        $consulta = mysqli_query($db, $sql);

        return $consulta;

        //3. Acceder a los resultados      
        //El cierre es opcional. PHP cierra la conexión al final si está abierta
    //mysqli_close($db);
    }
    //Catch se usa en complemento con try
    
    catch(\Throwable $th){
        echo('<pre>');
        var_dump($th);
        echo('</pre>');
    }
}

?>


