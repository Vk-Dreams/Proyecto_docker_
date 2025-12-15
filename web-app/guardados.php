<head> 
    <!-- Enlace a la hoja de estilos CSS -->
    <link rel="stylesheet" href="/CSS/mostrar.css">
</head>
<body>
    <!-- Encabezado con logo de la empresa -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="Logo Urbanova">
    </div><br><br>
    
    <!-- Título principal de la página -->
    <label class="big" for="">INMUEBLES DE SU INTERES</label>
    
<?php
// Incluye el archivo de conexión a la base de datos
include "conectar.php";

// Obtiene el código de persona desde la URL
$codigop = $_GET['codigo_per'];

// Consulta SQL para obtener los inmuebles asociados a la persona
$consulta = "SELECT a.* FROM inmueble AS a, per_inm AS b 
             WHERE b.codigo_per = '$codigop' AND a.codigoi = b.codigo_inm";

// Ejecuta la consulta principal
if ($resultado = $conn->query($consulta)) {
    // Contenedor principal para los inmuebles
    echo ("<div class='container'>");
    
    // Recorre cada inmueble encontrado
    while ($row = $resultado->fetch_assoc()) {
        // Contenedor para cada inmueble individual
        echo ("<div class='wrapper'>");
        echo ("<div class='title'><span>INMUEBLE</span></div>");
        
        // Consulta para obtener la primera foto del inmueble
        $fotos = "SELECT Foto FROM fotos WHERE codigoi=".$row["codigoi"]." LIMIT 1";
        
        if ($resultado2 = $conn->query($fotos)) {
            while ($fila = $resultado2->fetch_assoc()) {
                // Muestra la imagen del inmueble
                echo("<div class='foto'>");
                echo("<img src='/fotos_inm/" . $fila['Foto'] ."' alt='Imagen del inmueble' width='400' height='350'><br>");
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
        echo "<div class='row'><i class='fas fa-lock'>Precio</i><div class='text1'>". number_format($row["precio"],2)." Dólares</div></div>"; 
        
        // Botón para ver más detalles del inmueble
        echo "<div class='rowc'><a href='inm_detalle.php?codigoi=".$row["codigoi"]."'><div class='boton'>VER DETALLE</div></a></div>";
        
        echo "</div>"; // Cierre del wrapper del inmueble
        echo"<br>";
    }
    echo "</div>"; // Cierre del container principal
} else {
    // Mensaje si no se encuentran inmuebles
    echo "NO EXISTEN INMUEBLES GUARDADOS";
}
?>
</body>