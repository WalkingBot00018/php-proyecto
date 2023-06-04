
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOTEL LODGING</title>
    <?php
    $background_color = '#778bbc';
    echo '<style>
            body {
                background-color: ' . $background_color . ';
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }
            
            h3 {
                color: black;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 40px;
            }
            
            
        </style>';
    ?>
</head>

<body> 
   
    <h3>HOTEL LODGING - Administración de clientes, usuarios, empleados</h3>
    <div class="Boton">        
    <a href="admin/usuario/crear.php">Crear usuario</a><br>
    <a href="admin/cliente/cliente.php">Crear cliente</a>
    <a href="admin/empleado/empleado.php">crear empleado</a><br>
    <a href="admin/usuario/Consultar.php">Listar los usuarios</a><br>
    <a href="admin/cliente/Consultarcli.php">Listar los clientes</a><br>
    <a href="admin/empleado/Consultarem.php">Listar empleados</a><br>
    </div> 
 <style>
.Boton{
    align-items: center;
    padding: 15px 15px;
    margin-left: 550px;
    width: 300px;
    height: 360px;
    background-color: white;
    border-radius: 10px;
  
}
a {
                color: black;
                padding: 5px 50px;
                width: 200px;
                height: 20px;
                display: block;
                text-align: center;
                margin-bottom: 20px;
                text-decoration: none;
                background-color: #808080;
                border-radius: 5px;
            }
</style>

</body>
