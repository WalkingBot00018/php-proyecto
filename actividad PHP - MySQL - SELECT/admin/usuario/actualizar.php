<?php

$Nro_Documento=$_GET['Nro_Documento'];
$Nro_Documento=filter_var($Nro_Documento, FILTER_VALIDATE_INT);

if(!$Nro_Documento){
    header('location: ../usuario/Consultar.php');
}

$consultar_usuario="SELECT * FROM usuario WHERE 'Nro_Documento==$Nro_Documento";
echo $consultar_usuario;

require '../../includes/actualizar.php';
$bd=conectar_db();
$errores=[];

if($_SERVER['REQUEST_METHOD']=='POST'){

    $Nro_Documento=$_POST['Nro_Documento'];
    $Calle=$_POST['Calle'];
    $Telefono=$_POST['Telefono'];
    $Email=$_POST['Email'];
    $Contraseña=$_POST['Contraseña'];
    $Fecha_restablecimiento=$_POST['Fecha_restablecimiento'];
    $Fecha_registro=$_POST['Fecha_registro'];

    if(!$Nro_Documento){
        $errores[]='El numero de identificacion es obligatorio';
    }
    if(!$Calle){
        $errores[]='La calle no fue ingresada';
    }
    if(!$Telefono){
        $errores[]='El numero de telefono no fue ingresado';
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
        $sql="INSERT INTO usuario(Nro_Documento,Calle,Telefono,Email,Contraseña,Fecha_restablecimiento,Fecha_registro)
        VALUES('$Nro_Documento','$Calle','$Telefono','$Email','$Contraseña','$Fecha_restablecimiento','$Fecha_registro')";
        
        echo $sql;

        $resultado=mysqli_query($bd, $sql);

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
<div>
    <p>Actualizar datos del usuario</p>

    <a href='../../index.php'>Regresa</a>

    <form class='formulario' method='POST' action='crear.php'>
        <fieldset>
            <legend>Datos</legend>
            <label for='Nro_Documento'>No:</label><br>
            <input type='text' id='Nro_Documento' name='Nro_Documento'><br>

            <label for='Numero'>No. Documento:</label><br>
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
        
            <input type='submit' id='enviar' name='enviar' value='Actualizar datos'>
            
        </fieldset>
    </form>
</div>