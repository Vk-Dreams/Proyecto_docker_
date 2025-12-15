<?php
// 1. INCLUSIÓN DE ARCHIVO DE CONEXIÓN
include "conectar.php"; // Incluye el archivo que establece la conexión a la base de datos

// 2. RECEPCIÓN DE PARÁMETROS
$codigoi = $_GET['codigoi']; // Obtiene el ID del inmueble desde la URL
$codigop = $_GET['codigop']; // Obtiene el ID del propietario desde la URL

// 3. CONSULTA SQL PARA ELIMINAR FOTOS
$consulta = "DELETE FROM fotos WHERE codigoi = " . $codigoi; // Prepara consulta para borrar todas las fotos del inmueble

// 4. EJECUCIÓN DE LA CONSULTA
if ($conn->query($consulta)) { // Intenta ejecutar la consulta de eliminación
    // 4.1. REDIRECCIÓN SI ES EXITOSO
    $camino = "location:inm_editar.php?codigop=" . $codigop; // Prepara URL de redirección
    header($camino); // Redirige a la página de edición del inmueble
}
else {
    // 5. MENSAJE DE ERROR SI FALLA
    echo "ERROR: NO SE PUDO BORRAR LAS FOTOS"; // Muestra mensaje de error
}
?>