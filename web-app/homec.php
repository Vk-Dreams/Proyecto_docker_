<head> 
    <!-- Incluye hoja de estilos CSS para el diseño de la página -->
    <link rel="stylesheet" href="/CSS/mostrar.css">
</head>
<body>
    <!-- Encabezado con logo de la empresa -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="Logo Urbanova">
    </div><br>
    
    <!-- Título principal de la sección -->
    <label class="big" for="">Inmuebles disponibles</label>

<?php
// Conexión a la base de datos
include "conectar.php";

// Consulta SQL para obtener todos los inmuebles
$consulta = "SELECT * FROM inmueble";

// Obtiene el código del usuario/perfil desde la URL
$codigop = $_GET['codigo_per'];

// Ejecuta la consulta principal
if ($resultado = $conn->query($consulta)) {
    // Contenedor principal para los inmuebles
    echo ("<div class='container'>");
    
    // Recorre cada inmueble en los resultados
    while ($row = $resultado->fetch_assoc()) {
        // Contenedor individual para cada inmueble
        echo ("<div class='wrapper'>");
        echo ("<div class='title'><span>INMUEBLE</span></div>");
        
        // Consulta para obtener la primera foto del inmueble
        $fotos = "SELECT Foto FROM fotos WHERE codigoi=".$row["codigoi"]." LIMIT 1";
        
        if ($resultado2 = $conn->query($fotos)) {
            while ($fila = $resultado2->fetch_assoc()) {
                // Muestra la imagen principal del inmueble
                echo("<div class='foto'>");
                echo("<img src='/fotos_inm/" . $fila['Foto'] . "' alt='Imagen del inmueble' width='400' height='350'><br>");
                echo("</div>");
            }
        }
        
        // Muestra los detalles del inmueble:
        echo "<div class='row'><i class='fas fa-lock'>Dirección</i><div class='text1'>". $row["direccion"]."</div></div>";
        echo "<div class='row'><i class='fas fa-lock'>Metros cuadrados</i><div class='text1'>". $row["m2"]."m²</div></div>";
        echo "<div class='row'><i class='fas fa-lock'><img src='/img/dormitorio.png'></i><div class='text1'>". $row["habitaciones"]." habitaciones</div></div>"; 
        echo "<div class='row'><i class='fas fa-lock'><img src='/img/banera.png'></i><div class='text1'>". $row["banos"]." baños</div></div>"; 
        echo "<div class='row'><i class='fas fa-lock'>Precio</i><div class='text1'>$".number_format($row["precio"],2)." USD</div></div>"; 
        
        // Botón para ver detalles completos
        echo "<div class='rowc'><a href='inm_detalle.php?codigoi=".$row["codigoi"]."'><div class='boton'>VER DETALLE</div></a></div>";
        
        // Botón para guardar el inmueble (nueva funcionalidad)
        echo "<div class='rowc'><a href='guardarinm.php?codigop=".$codigop."&codigoi=".$row["codigoi"]."'><div class='boton'>GUARDAR</div></a></div>";
        
        echo "</div>"; // Cierra contenedor del inmueble
        echo "<br>"; // Espacio entre inmuebles
    }
    echo "</div>"; // Cierra contenedor principal
} else {
    // Mensaje de error si falla la consulta
    echo "No se pudieron cargar los inmuebles";
}
?>
</body>