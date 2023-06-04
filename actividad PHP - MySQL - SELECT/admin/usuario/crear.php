<?php
require '../../includes/funciones.php';

$bd=conectar_db();
$errores=[];


    if($_SERVER["REQUEST_METHOD"] == 'POST'){

        $Nro_Documento=$_POST['Nro_Documento'];
        $Numero = $_POST['Numero'];
        $Calle = $_POST['Calle'];
        $Telefono = $_POST['Telefono'];
        $Email = $_POST['Email'];
        $Contraseña = $_POST['Contraseña'];
        $Fecha_restablecimiento = $_POST['Fecha_restablecimiento'];
        $Fecha_registro = $_POST['Fecha_registro'];
    
        if(!$Nro_Documento){
            $errores[]='El numero de documento no fue ingresado';
        }
        if(!$Numero){
            $errores[]='El numero de identificacion es obligatorio';
        }
        if(!$Calle){
            $errores[]='La calle no fue ingresada';
        }
        if(!$Telefono){
            $errores[]='El telefono no fue ingresado';
        }
        if(!$Email){
            $errores[]='El email no fue ingresado';
        }
        if(!$Contraseña){
            $errores[]='La contraseña no fue ingresada';
        }
        if(!$Fecha_restablecimiento){
            $errores[]='La fecha de restablecimiento no fue ingresada';
        }
        if(!$Fecha_registro){
            $errores[]='La fecha de registro no fue ingresada';
        }

        if(empty($errores)){
            
            $sql="INSERT INTO usuario(Nro_Documento,Numero,calle,Telefono,Email,Contraseña,Fecha_restablecimiento,Fecha_registro)
            VALUES('$Nro_Documento','$Numero','$Calle','$Telefono','$Email','$Contraseña','$Fecha_restablecimiento','$Fecha_registro')";

            echo $sql;
            $resultado=mysqli_query($bd,$sql);
        
            if($resultado){

                header('location: ../../index.php');

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
        background: linear-gradient(to right, #396ae4, #033fcb);
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
</head>

<div class="Nuevo_cliente">
    <p>usuario nuevo</p>
    <a href="../../index.php">Regresar</a>
    <form class='formulario' method='POST' action="crear.php">
        <fieldset>
            <legend>Datos usuarios</legend>
            <label for='Nro_Documento'>No. Documento:</label><br>
            <input type='text' id='Nro_Documento' name='Nro_Documento'><br>

            <label for='Numero'>Numero</label><br>
            <input type='text' id='Numero' name='Numero'><br>

            <label for='Calle'>Calle:</label><br>
            <input type='text' id='Calle' name='Calle'><br>

            <label for='Telefono'>Telefono:</label><br>
            <input type='text' id='Telefono' name='Telefono'><br>

            <label for='Email'>Email:</label><br>
            <input type='text' id='Email' name='Email'><br>
         
            <label for='Contraseña'>Contraseña:</label><br>
            <input type='mail' id='Contraseña' name='Contraseña'><br>
            
            <label for='Fecha_restablecimiento'>Fecha_restablecimiento:</label><br>
            <input type='date' id='Fecha_restablecimiento' name='Fecha_restablecimiento'><br>
            
            <label for='Fecha_registro'>Fecha_registro:</label><br>
            <input type='date' id='Fecha_registro' name='Fecha_registro'><br>
            <br>

            <input type='submit' id='enviar' name='enviar' value='Enviar datos'><br>
        </fieldset>       
    </form>
</div>