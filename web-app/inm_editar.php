<head> 
    <!-- Incluye hoja de estilos CSS para el diseño de la página -->
    <link rel="stylesheet" href="/CSS/mostrar.css">
</head>
<body>
    <!-- Encabezado con logo de la empresa -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="Logo Urbanova">
    </div><br><br>
    
    <!-- Título principal de la sección -->
    <label class="big" for="">INMUEBLES PROPIOS</label>

<?php
// 1. Conexión a la base de datos
include "conectar.php";

// 2. Obtiene el código del propietario desde la URL
$codigop = $_GET['codigop'];

// 3. Consulta SQL para obtener los inmuebles del propietario
$consulta = "SELECT * FROM inmueble WHERE codigo_per = '$codigop'";

// 4. Ejecuta la consulta principal
if ($resultado = $conn->query($consulta)) {
    // 4.1. Contenedor principal para los inmuebles
    echo ("<div class='container'>");
    
    // 4.2. Recorre cada inmueble del propietario
    while ($row = $resultado->fetch_assoc()) {
        // 4.2.1. Contenedor individual para cada inmueble
        echo ("<div class='wrapper'>");
        echo ("<div class='title'><span>INMUEBLE</span></div>");
        
        // 4.2.2. Consulta para obtener la primera foto del inmueble
        $fotos = "SELECT Foto FROM fotos WHERE codigoi=".$row["codigoi"]." LIMIT 1";
        
        if ($resultado2 = $conn->query($fotos)) {
            while ($fila = $resultado2->fetch_assoc()) {
                // Muestra la imagen principal del inmueble
                echo("<div class='foto'>");
                echo("<img src='/fotos_inm/" . $fila['Foto'] . "' alt='Imagen del inmueble' width='400' height='350'><br>");
                echo("</div>");
            }
        }
        
        // 4.2.3. Muestra los detalles del inmueble:
        echo "<div class='row'><i class='fas fa-lock'>Dirección</i><div class='text1'>". $row["direccion"]."</div></div>";
        echo "<div class='row'><i class='fas fa-lock'>Metros Cuadrados Terreno</i><div class='text1'>". $row["m2"]."mts2</div></div>";
        echo "<div class='row'><i class='fas fa-lock'><img src='/img/dormitorio.png'></i><div class='text1'>". $row["habitaciones"]."</div></div>"; 
        echo "<div class='row'><i class='fas fa-lock'><img src='/img/banera.png'></i><div class='text1'>". $row["banos"]."</div></div>"; 
        echo "<div class='row'><i class='fas fa-lock'>Precio</i><div class='text1'>$".number_format($row["precio"],2)." USD</div></div>"; 
        
        // 4.2.4. Botones de gestión para cada inmueble:
        // - Eliminar inmueble
        echo "<div class='rowc'><a href='inm_eliminar.php?codigoi=".$row["codigoi"]."&codigop=".$codigop."'><div class='boton'>ELIMINAR</div></a></div>";
        // - Añadir fotos
        echo "<div class='rowc'><a href='reg_foto.php?codigoi=".$row["codigoi"]."'><div class='boton'>ADICIONAR FOTOS</div></a></div>";
        // - Borrar fotos
        echo "<div class='rowc'><a href='inm_elimfotos.php?codigoi=".$row["codigoi"]."&codigop=".$codigop."'><div class='boton'>BORRAR FOTOS</div></a></div>";
        // - Editar inmueble
        echo "<div class='rowc'><a href='inm_modifica.php?codigoi=".$row["codigoi"]."&codigop=".$codigop."'><div class='boton'>EDITAR</div></a></div>";
        
        echo "</div>"; // Cierra contenedor del inmueble
        echo "<br>"; // Espacio entre inmuebles
    }
    echo "</div>"; 
} else {
    // 5. Mensaje si no hay inmuebles o hay error
    echo "NO EXISTEN INMUEBLES GUARDADOS";
}
?>
</body>