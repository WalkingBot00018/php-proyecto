<?php 
require '../../includes/funciones.php';

$db = conectar_db();

//El arreglo $errores nos guarda mensajes de error en caso de no escribir nada en el formulario
$errores =  [];

//echo '<pre>';
//if(($_SERVER['REQUEST_METHOD'])){
//echo '<pre>';
//var_dump(($_POST));
//}

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $id = $_POST['Nro_Documento'];
        $nombre = $_POST['Nombre'];
        $apellido = $_POST['Apellido'];
        $telefono = $_POST['Telefono'];
        $genero = $_POST['Genero'];
        
        if(!$id){
            $errores[] = 'El número de identificación es obligatorio';
        }
        if(!$nombre){
            $errores[] = 'El primer apellido es obligatorio';
        }
        if(!$apellido){
            $errores[] = 'El nombre es obligatorio';
        }
        if(!$telefono){
            $errores[] = 'El correo es obligatorio';
        }
        if(!$genero){
            $errores[] = 'El genero es obligatorio';
        }
        
        
        if(empty($errores)){
        //Insertar los datos a la BD
        
            $sql = "INSERT INTO cliente(Nro_Documento,Nombre,Apellido,Telefono,Genero) 
            VALUES ('$id', '$nombre', '$apellido', '$telefono','$genero')" ;

            echo $sql;

            $resultado = mysqli_query($db, $sql);

            if($resultado){
                //'El registro se ha insertado correctamente';
                //Nos devolvemos a la página inicial
                header('location: ../../index.php');

            }
            }
            else{
                foreach($errores as $error){
                    echo '<br>' . $error;
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

<body> 
   
    <h3>HOTEL LODGING</h3>

    <div class = "Nuevo_cliente">
        <p>Nuevo cliente</p>
        <a href="../../index.php">Regresar</a>

        <form class="formulario" method="POST" action="crear.php">
            <fieldset>
                <legend>Datos</legend>
                <label for="Nro_Documento">No. Identificación</label><br>
                <input type="int" id="Nro_Documento" name="Nro_Documento"><br>

                <label for="Nombre">Nombres:</label><br>
                <input type="text" id="Nombre" name="Nombre"><br>

                <label for="Apelldo">Apellido:</label><br>
                <input type="text" id="Apellido" name="Apellido" ><br>

                <label for="Telefono">Telefono:</label><br>
                <input type="int" id="Telefono" name="Telefono" ><br>

                <label for="Genero">Genero:</label><br>
                <input type="text" id="Genero" name="Genero" ><br>

                
                <input type="submit" id="enviar" name="enviar" value="Enviar datos">
            </fieldset>
            
        </form>

    </div>

