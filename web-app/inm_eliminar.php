<?php
// Incluye el archivo de conexión a la base de datos
include "conectar.php";

// Obtiene los parámetros de la URL
$codigoi = $_GET['codigoi']; // ID del inmueble a eliminar
$codigop = $_GET['codigop']; // ID del propietario (para redirección)

// 1. Primera consulta: Eliminar las fotos asociadas al inmueble
$consulta = "DELETE FROM fotos WHERE codigoi = " . $codigoi;
$conn->query($consulta); 

// 2. Segunda consulta: Eliminar el inmueble
$consulta2 = "DELETE FROM inmueble WHERE codigoi = ". $codigoi;

// Intenta eliminar el inmueble
if ($conn->query($consulta2)) {
    // Redirecciona si es exitoso
    $camino = "location:inm_editar.php?codigop=" . $codigop; 
    header($camino);
} else {
    // Mensaje de error
    echo "ERROR: NO SE PUDO BORRAR EL INMUEBLE";
}
?>