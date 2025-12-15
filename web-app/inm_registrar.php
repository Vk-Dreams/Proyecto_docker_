<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"> <!-- Define la codificación de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Para un diseño responsive en dispositivos móviles -->
    <link rel="stylesheet" href="/CSS/tablas.css"> <!-- Vincula la hoja de estilos CSS -->
    <title>Document</title> <!-- Título de la página -->
</head>
<body>

<?php
include "conectar.php"; // Incluye el archivo que contiene la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica si la solicitud se hizo mediante el método POST
    $codigop = $_POST['codigop'];  // Almacena en una variable el valor enviado del formulario con nombre 'codigop'
    $dir = $_POST['direccion'];    // Almacena el valor del campo 'direccion'
    $hab = $_POST['habitacion'];   // Almacena el número de habitaciones
    $banos = $_POST['banos'];      // Almacena el número de baños
    $mts2 = $_POST['mts2'];        // Almacena los metros cuadrados del terreno
    $mtsc = $_POST['mtsc'];        // Almacena los metros cuadrados de construcción
    $precio = $_POST['precio'];    // Almacena el precio del inmueble
    $tipo = $_POST['tipo'];        // Almacena el tipo de inmueble
    $des = $_POST['descrip'];      // Almacena la descripción del inmueble

    // Crea la consulta SQL para insertar los datos en la tabla 'inmueble'
    $consulta ="INSERT INTO inmueble (direccion,habitaciones,banos,m2,m2c,precio,tipo,descripcion,codigo_per) VALUES ('$dir', '$hab','$banos','$mts2','$mtsc','$precio','$tipo','$des','$codigop');"; 
    
    // Ejecuta la consulta y verifica si fue exitosa
    if ($conn->query($consulta) === TRUE) {  
        // Si la consulta fue exitosa, obtiene el ID del último registro insertado
        $id = $conn->insert_id;

        // Construye la ruta para redireccionar al formulario de registro de fotos
        $camino = "location:reg_foto.php?codigoi=".$id; 
        
        // Redirige a la página de registro de fotos pasando como parámetro el ID del inmueble
        header($camino);
    } else {  
        // En caso de error, muestra un mensaje con el error devuelto por la conexión
        echo "Error: '$conn->error'";  
    }  
}
?>
</body>
</html>