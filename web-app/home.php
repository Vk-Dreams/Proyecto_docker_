<head> 
    <!-- Enlace a la hoja de estilos CSS para el diseño de la página -->
    <link rel="stylesheet" href="/CSS/mostrar.css">
</head>
<body>
    <!-- Encabezado con el logo de la empresa -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="Logo URBANOVA">
    </div><br>
    
    <!-- Título principal de la sección -->
    <label class="big" for="">Inmuebles Disponibles</label>

<?php
// Incluye el archivo de conexión a la base de datos
include "conectar.php";

// Consulta SQL para obtener todos los inmuebles
$consulta = "SELECT * FROM inmueble";

// Ejecuta la consulta principal
if ($resultado = $conn->query($consulta)) {
    // Contenedor principal para los listados de inmuebles
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
                echo("<img src='/fotos_inm/" . $fila['Foto'] . "' alt='Imagen del inmueble' width='400' height='auto'><br>");
                echo("</div>");
            }
        }
        
        // Muestra los detalles del inmueble:
        // 1. Dirección
        echo "<div class='row'><i class='fas fa-lock'>Dirección</i><div class='text1'>". $row["direccion"]."</div></div>";
        
        // 2. Metros cuadrados del terreno
        echo "<div class='row'><i class='fas fa-lock'>Metros Cuadrados Terreno</i><div class='text1'>". $row["m2"]."mts2</div></div>";
        
        // 3. Número de habitaciones (con icono)
        echo "<div class='row'><i class='fas fa-lock'><img src='/img/dormitorio.png'></i><div class='text1'>". $row["habitaciones"]."</div></div>"; 
        
        // 4. Número de baños (con icono)
        echo "<div class='row'><i class='fas fa-lock'><img src='/img/banera.png'></i><div class='text1'>". $row["banos"]."</div></div>"; 
        
        // 5. Precio formateado
        echo "<div class='row'><i class='fas fa-lock'>Precio</i><div class='text1'>$". number_format($row["precio"],2)." Dólares</div></div>"; 
        
        // Botón para ver detalles completos del inmueble
        echo "<div class='rowc'><a href='inm_detalle.php?codigoi=".$row["codigoi"]."'><div class='boton'>VER DETALLE</div></a></div>";
        
        echo "</div>"; // Cierra el contenedor del inmueble
        echo "<br>"; // Espacio entre inmuebles
    }
    echo "</div>"; // Cierra el contenedor principal
} else {
    // Mensaje si hay error en la consulta
    echo "No se encontraron inmuebles disponibles";
}
?>
</body>