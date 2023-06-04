<?php
 require 'includes/funciones.php';

$db = conectar_db();


 $consulta = obtener_clientes($db);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel lodging</title>
    
</head>
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
                color: white;
                text-align: center;
                margin-top: 20px;
                margin-bottom: 40px;
            }
            
            a {
                color: white;
                display: block;
                text-align: left;
                margin-bottom: 20px;
                text-decoration: none;
            }
        </style>';
    ?>





<body>
   
    <p>Hotel lodging - Administración de clientes</p>
   
    <?php
        
    if ($consulta) {
        // Recorrer los registros y mostrar los datos de los clientes
        while ($cliente = mysqli_fetch_assoc($consulta)) {
            echo "ID: " . $cliente['Id_Cliente'] . "<br>";
            echo "No. Documento: " . $cliente['Nro_Documento'] . "<br>";
            echo "Nombre: " . $cliente['Nombre'] . "<br>";
            echo "Apellido: " . $cliente['Apellido'] . "<br>";
            echo "<br>";
            }
        } else {
            // Mostrar mensaje de error si la consulta falla
            echo "Error en la consulta: " . mysqli_error($conexion);
        }
        
        
    ?>

    <a href="admin/clientes/crear.php">Crear cliente</a>

