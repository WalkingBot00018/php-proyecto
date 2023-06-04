<?php
function conectar_db()
{
    $db = mysqli_connect('127.0.0.1:3308', 'root', '', 'lodging3.0');
    
    if (!$db) {
        echo 'No se pudo conectar a la base de datos';
        exit;
    }
    
    return $db;
}
?>
