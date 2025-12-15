<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Enlace a la hoja de estilos CSS -->
    <link rel="stylesheet" href="/CSS/mostrar.css">
</head>
<body>
    <!-- Encabezado con logo -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="Logo Urbanova">
    </div><br>
    
    <!-- Título de la página -->
    <label class="big" for="">Resultados de Búsqueda</label>
    <br>
    
    <?php
    // Conexión a la base de datos
    $cnx = mysqli_connect("localhost", "root", "", "proy");

    // Verifica si se envió el formulario de búsqueda
    if (isset($_POST['buscar'])) {
        $buscar = mysqli_real_escape_string($cnx, $_POST['buscar']);
        // Consulta SQL para buscar por dirección o descripción
        $sql = "SELECT * FROM inmueble WHERE direccion LIKE '%$buscar%' OR descripcion LIKE '%$buscar%'";
    } else {
        // Consulta por defecto para mostrar los primeros 5 inmuebles
        $sql = "SELECT * FROM inmueble LIMIT 5";
    }

    // Ejecuta la consulta
    $rta = mysqli_query($cnx, $sql);

    // Verifica si hay resultados y los muestra
    if ($rta && mysqli_num_rows($rta) > 0) {
        echo ("<div class='container'>");
        while ($row = mysqli_fetch_assoc($rta)) {
            echo ("<div class='wrapper'>");
            echo ("<div class='title'><span>INMUEBLE</span></div>");
            
            // Consulta para obtener la primera foto del inmueble
            $fotos = "SELECT Foto FROM fotos WHERE codigoi=" . $row["codigoi"] . " LIMIT 1";
            $resultado2 = mysqli_query($cnx, $fotos);
            
            if ($resultado2) {
                while ($fila = mysqli_fetch_assoc($resultado2)) {
                    echo("<div class='foto'>");
                    // Muestra la imagen del inmueble
                    echo("<img src='/fotos_inm/" . $fila['Foto'] . "' alt='Descripción de la imagen' width='400' height='350'><br>");
                    echo("</div>");
                }
            }
            
            // Muestra los detalles del inmueble
            echo "<div class='row'><i class='fas fa-lock'>Dirección</i><div class='text1'>". $row["direccion"]."</div></div>";
            echo "<div class='row'><i class='fas fa-lock'>Metros Cuadrados Terreno</i><div class='text1'>". $row["m2"]."mts2</div></div>";
            echo "<div class='row'><i class='fas fa-lock'><img src='/img/dormitorio.png'></i><div class='text1'>". $row["habitaciones"]."</div></div>"; 
            echo "<div class='row'><i class='fas fa-lock'><img src='/img/banera.png'></i><div class='text1'>". $row["banos"]."</div></div>"; 
            echo "<div class='row'><i class='fas fa-lock'>Precio</i><div class='text1'>". number_format($row["precio"],2)." Dólares</div></div>"; 
            
            // Botón para ver más detalles del inmueble
            echo "<div class='rowc'><a href='inm_detalle.php?codigoi=".$row["codigoi"]."'><div class='boton'>VER DETALLE</div></a></div>";
            echo "</div>";
            echo"<br>";
        }
        echo "</div>";
    } else {
        echo "No se encontraron resultados.";
    }

    // Cierra la conexión a la base de datos
    mysqli_close($cnx);
    ?>
</body>
</html>