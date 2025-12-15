<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Configuración básica del documento -->
  <meta charset="UTF-8"> <!-- Codificación de caracteres -->
    <title>URBANOVA | HOME</title> <!-- Título de la página -->
    <link rel="stylesheet" href="/CSS/style1.css"> <!-- Hoja de estilos principal -->
    <!-- Enlace a los iconos Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <!-- Configuración del viewport para responsive -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<!-- Hoja de estilos adicional para tablas -->
<link rel="stylesheet" href="../web-app/CSS/tablas.css">
  

<?php
// Incluye el archivo de conexión a la base de datos
include "conectar.php";
// Verifica si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    // Recupera los datos del formulario
    $tipo = $_POST['tipo']; // Tipo de usuario
    $nom = $_POST['nombre']; // Nombre del usuario
    $AP = $_POST['ap_paterno']; // Apellido paterno
    $AM = $_POST['ap_materno']; // Apellido materno
    $email = $_POST['email']; // Correo electrónico
    $fono = $_POST['fono']; // Teléfono
    $direc = $_POST['direccion']; // Dirección
    $user = $_POST['user']; // Nombre de usuario
    $contrasena = password_hash($_POST['password'],PASSWORD_DEFAULT); // Contraseña encriptada

    // Consulta SQL para insertar los datos en la tabla persona
    $consulta ="INSERT INTO persona (nombre,ap_paterno,ap_materno,email,telefono,direccion,tipo_user,user,passwd) VALUES ('$nom', '$AP','$AM','$email','$fono','$direc','$tipo','$user','$contrasena');";
    
    // Ejecuta la consulta
    if ($conn->query($consulta) === TRUE) {  
        // Si la inserción es exitosa, obtiene el ID del nuevo registro
        $codigo_per = $conn->insert_id;  
        // Prepara la redirección
        $camino = "location:clave1.html";
        // Redirige a la página de login
        header($camino);
    } else {  
        // Muestra error si la consulta falla
        echo "Error: '$conn->error'";  
    }  
}
?>
</body>
</html>