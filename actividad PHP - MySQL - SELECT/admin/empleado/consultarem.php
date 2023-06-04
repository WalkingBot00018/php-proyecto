<?php

require '../../includes/funciones.php';

$bd=conectar_db();
$consulta="SELECT * FROM empleado";

$resultado_consulta=mysqli_query($bd, $consulta);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar usuarios</title>
</head>
<body>
<h3>Gestion de usuarios - Consultar</h3>

<table>
    <th>
        <tr>
            <td>Nro_empleado</td>
            <td>Nro_Documento</td>
            <td>nombre</td>
            <td>cargo</td>
            <td>sueldo</td>
            
            
        </tr>
    </th>
    
    <?php while($empleado=mysqli_fetch_assoc($resultado_consulta)){?>
    <tr>
        <td> <?php echo $empleado['Nro_empleado'];?></td>
        <td> <?php echo $empleado['Nro_Documento'];?></td>
        <td> <?php echo $empleado['nombre'];?></td>
        <td> <?php echo $empleado['cargo'];?></td>
        <td> <?php echo $empleado['sueldo'];?></td>
        <td>
            <a href="">Eliminar</a>
            <a href="/admin/usuario/actualizar.php?Nro_Documento=<?php echo $usuario['Nro_Documento'];?>">Actualizar</a>
            <?php }?>
        </td>
    </tr>
    <a href="../../index.php">Regresar...</a>
</table>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #808080;
            margin: 0;
            padding: 20px;
        }

        h3 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 3px;
            margin-right: 5px;
        }

        a:hover {
            background-color: #45a049;
        }

        a:last-of-type {
            margin-right: 0;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>

    


<?php
mysqli_close($bd);
?>
</body>
</html>