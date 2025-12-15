<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/CSS/mostrar.css">    
    <title>Document</title>
</head>
<body>
  
<?php
include "conectar.php"; // Incluye el archivo de conexión a la base de datos
// 2. OBTENCIÓN DE PARÁMETROS
$codigoi = $_GET['codigoi'];
// 3. CONSULTA PRINCIPAL (INMUEBLE + DATOS PROPIETARIO)
$consulta ="select a.*, b.nombre,b.ap_paterno,b.ap_materno,b.telefono,b.email from inmueble as a , persona as b where a.codigoi = '$codigoi' and b.codigo_per = a.codigo_per";
// 4. EJECUCIÓN Y RENDERIZADO DE RESULTADOS
if ($resultado = $conn->query($consulta)) {
    // 4.1. ESTRUCTURA HTML CONTENEDORA
    echo ("<div class='container'>");
     // 4.2.1. SECCIÓN DE TIPO DE INMUEBLE (con switch para mostrar texto descriptivo)
    while ($row = $resultado->fetch_assoc()) {
        echo ("<div class='wrapper'>");
        echo ("<div class='title'><span>INMUEBLE</span></div><br>");
        echo "<div class='row'><i class='fas fa-lock'>Tipo Inmueble</i>";
        switch ($row['tipo']) {
            case "D":
                echo "<div class='text1'>DEPARTAMENTO</div></div>";
                break;
            case "C":
                echo "<div class='text1'>CASA</div></div>";
                break;
            case "T":
                echo "<div class='text1'>TERRENO</div></div>";
                break;
            default:
               echo "NO SE SABE";
    // 4.2.2. SECCIÓN DE DETALLES DEL INMUEBLE
        }
        echo "<div class='row'><i class='fas fa-lock'>Direccion</i><div class='text1'>". $row["direccion"]."</div></div>";
        echo "<div class='row'><i class='fas fa-lock'>Metros Cuadrados Terreno</i><div class='text1'>". $row["m2"]."mts2</div></div>";
        echo "<div class='row'><i class='fas fa-lock'><img src='/img/dormitorio.png'></i><div class='text1'>". $row["habitaciones"]."</div></div>"; 
        echo "<div class='row'><i class='fas fa-lock'><img src='/img/banera.png'></i><div class='text1'>". $row["banos"]."</div></div>"; 
        echo "<div class='row'><i class='fas fa-lock'>Precio</i><div class='text1'>". number_format($row["precio"],2)." Dolares</div></div>"; 
        echo "<div class='row'><i class='fas fa-lock'>Descripcion</i></div>"; 
        echo "<div class='rowg'><div class='grande'>".$row["descripcion"]."</div></div>";
        // 4.2.3. SECCIÓN DE CONTACTO DEL PROPIETARIO
        echo "<div class='row'><i class='fas fa-lock'>Nombre Contacto</i><div class='text1'>". $row["nombre"]. " ".$row["ap_paterno"]." ".$row["ap_materno"]."</div></div>";
        echo "<div class='row'><i class='fas fa-lock'>Telefono</i><div class='text1'>". $row["telefono"]."</div></div>";
        echo "<div class='row'><i class='fas fa-lock'>Correo Electronico</i><div class='text1'>". $row["email"]."</div></div><br>";
        echo "</div>";
        echo"<br>";
    // 5. CONSULTA Y MUESTRA DE FOTOS DEL INMUEBLE
    }
    $fotos = "select Foto from fotos where codigoi=".$codigoi;
    if ($resultado2 = $conn->query($fotos)) {
        while ($fila = $resultado2->fetch_assoc())
        {
            echo("<br><div class='foto'>");
            echo("<img src='/fotos_inm/" . $fila['Foto'] ."' alt='Descripción de la imagen' width='400' height='350'><br>");
            echo("</div>");
        }
    }
    echo "</div><br>";
} else {
     // 6. MENSAJE DE ERROR SI NO EXISTE EL INMUEBLE
    echo "no existe el inmueble";
}