<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/tablas.css"> 
    <title>Document</title> 
</head>
<body>
  
<?php
// Incluye el archivo de conexión a la base de datos
include "conectar.php";

// Verifica si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene los datos del formulario POST
    $codigoi = $_POST['codigoi']; // ID del inmueble
    $codigop = $_POST['codigop']; // ID de la persona/propietario
    $dir = $_POST['direccion'];   // Dirección del inmueble
    $hab = $_POST['habitacion'];  // Número de habitaciones
    $banos = $_POST['banos'];     // Número de baños
    $mts2 = $_POST['mts2'];       // Metros cuadrados de terreno
    $mtsc = $_POST['mtsc'];       // Metros cuadrados construidos
    $precio = $_POST['precio'];   // Precio del inmueble
    $tipo = $_POST['tipo'];       // Tipo de inmueble
    $des = $_POST['descrip'];     // Descripción del inmueble
    
    // Consulta SQL para actualizar el inmueble
    $consulta = "UPDATE inmueble SET 
                direccion='$dir',
                habitaciones='$hab',
                banos='$banos',
                m2='$mts2',
                m2c='$mtsc',
                precio='$precio',
                tipo='$tipo',
                descripcion='$des',
                codigo_per='$codigop' 
                WHERE codigoi= '$codigoi'"; 
    
    // Ejecuta la consulta de actualización
    if ($conn->query($consulta) === TRUE) {  
        // Redirecciona a la página de edición si es exitoso
        $camino = "location:inm_editar.php?codigop=" . $codigop;
        header($camino);
    } else {  
        // Muestra error si falla la consulta
        echo "Error: " . $conn->error;  
    }  
}
?>
</body>
</html>