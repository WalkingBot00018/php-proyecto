<?php
require '../../includes/funciones-empleado.php';

$bd=conectar_db();
$errores=[];


if($_SERVER["REQUEST_METHOD"]=='POST'){
    $Nro_empleado=$_POST['Nro_empleado'];
    $Nro_Documento=$_POST['Nro_Documento'];
    $nombre=$_POST['nombre'];
    $cargo=$_POST['cargo'];
    $sueldo=$_POST['sueldo'];
    
    if(!$Nro_empleado){
        $errores[]='El numero de el empleado obligatorio';
    }
    if(!$Nro_Documento){
        $errores[]='El numero de documento es obligatorio';
    }
    if(!$nombre){
        $errores[]='El nombre no fue ingresado';
    }
    if(!$cargo){
        $errores[]='El cargo no fue ingresado';
    }
    if(!$sueldo){
        $errores[]='El sueldo no fu ingresado';
    }

    if(empty($errores)){
        $sql="INSERT INTO empleado(Nro_empleado,Nro_Documento,nombre,cargo,sueldo)
        VALUES('$Nro_empleado','$Nro_Documento','$nombre','$cargo','$sueldo')";

        echo $sql;
        $resultado=mysqli_query($bd,$sql);


        if($resultado){
            header('location: ../../index-empleado.php');
        }
        }
        else{
            foreach($errores as $error){
                echo '<br>'. $error;
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL LODGING</title>
    <style>
        body {
        background-image: linear-gradient(to right, #00ffff, #000080);
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
    }

        h3 {
        font-family: 'Carrois Gothic SC', sans-serif;
        display: block;
        text-align: center;
        line-height: .8;
        color: white;
        margin-top: 20px;
        margin-bottom: 40px;
    }

    a {
        font-family: 'Carrois Gothic SC', sans-serif;
        display: block;
        text-align: left;
        line-height: .8;
        color: black;
        text-decoration: none;
        margin-bottom: 20px;
    }

        .Nuevo_cliente {
            
            max-width: 360px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            margin-top: 40px;
        }
        
        .Nuevo_cliente form fieldset {
            border: none;
            padding: 0;
            margin: 0;
        } 

        .Nuevo_cliente input[type="submit"] {
        background-color: #033fcb;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 20px;
    }

        .Nuevo_cliente input[type="submit"]:hover {
        background-color: #396ae4;
        }

        .Nuevo_cliente label {
            display: block;
            font-size: 15px;
            color: #333333;
        }

        .Nuevo_cliente p {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
        }

        .Nuevo_cliente input[type="text"],
        .Nuevo_cliente input[type="submit"] {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #dddddd;
        border-radius: 5px;
        box-sizing: border-box;
    }
    
     
    .Nuevo_cliente legend {
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .Nuevo_cliente input[type="text"]:focus {
        outline: none;
        border-color: #396ae4;
        box-shadow: 0px 0px 5px rgba(57, 106, 228, 0.5);
    }

    .Nuevo_cliente input[type="submit"]:hover {
        background-color: #2b882e;
    }

    .Nuevo_cliente a:hover {
        text-decoration: underline;
    }

    </style>
<div class = "Nuevo_cliente">
    <p>empleados</p>
    <a href="../../index.php">Regresar</a>
    <form class='formlario' method='POST' action="empleado.php">
        <fieldset>
            <legend>Datos empleados</legend><br>
            <label for='Nro_empleado'>No_empleado:</label><br>
            <input type='text' id='Nro_empleado' name='Nro_empleado'><br>

            <label for='Nro_Documento'>No_Documento:</label><br>
            <input tyupe='text' id='Nro_Documento' name='Nro_Documento'><br>

            <label for='nombre'>Nombre:</label><br>
            <input type='text' id='nombre' name='nombre'><br>

            <label for='cargo'>Cargo:</label><br>
            <input type='text' id='cargo' name='cargo'><br>

            <label for='sueldo'>Sueldo:</label><br>
            <input type='text' id='sueldo' name='sueldo'><br>

            <input type='submit' id='enviar' name='enviar' value='Enviar datos'><br>
        </fieldset>
    </form>
</div>