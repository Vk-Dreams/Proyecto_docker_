<head>
    <!-- Incluye la hoja de estilos CSS para el diseño -->
    <link rel="stylesheet" href="/CSS/mostrar.css">
</head>
<body>
    <!-- Encabezado con el logo de la empresa -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="Logo Urbanova">
    </div><br><br>

<?php
// Incluye el archivo de conexión a la base de datos
include "conectar.php";

// Obtiene los parámetros de la URL:
// - codigop: Código de la persona/usuario
// - codigoi: Código del inmueble
$codigop = $_GET['codigop'];
$codigoi = $_GET['codigoi'];

// Consulta SQL para INSERTAR una nueva relación entre persona e inmueble (como favorito)
$consulta = "INSERT INTO per_inm (codigo_inm, codigo_per) VALUES ('$codigoi', '$codigop')";

// Intenta ejecutar la inserción
if ($resultado = $conn->query($consulta)) {
    // Si la inserción es exitosa, redirecciona a la página principal del cliente
    $camino = "location:homec.php?codigo_per='$codigop'"; 
    header($camino);
}
else {
    // Si falla la inserción, intenta ELIMINAR la relación
    $consulta = "DELETE FROM per_inm WHERE codigo_inm = '$codigoi' AND codigo_per = '$codigop'";
}
?>
</body>