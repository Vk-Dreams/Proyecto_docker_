<?php
include "conectar.php"; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    // Comprueba si se ha subido el archivo  
    if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {  
        $archivoTemp = $_FILES['imagen']['tmp_name'];  
        $nombreArchivo = $_FILES['imagen']['name'];  
        $tipoArchivo = $_FILES['imagen']['type'];  
        $tamañoArchivo = $_FILES['imagen']['size'];  
        $codigoi = $_POST['codigoi']; 

        // Define las extensiones y tipos MIME permitidos  
        $extensionesPermitidas = ['jpg', 'jpeg', 'png', 'gif'];  
        $tipoMIMEPermitidos = ['image/jpeg', 'image/png', 'image/gif'];  

        // Extrae la extensión del archivo  
        $extencionArchivo = strtolower(pathinfo($nombreArchivo, PATHINFO_EXTENSION));  

        // Valida la extensión  
        if (!in_array($extencionArchivo, $extensionesPermitidas)) {  
            die("Error: Solo se permiten imágenes JPG, JPEG, PNG y GIF.");  
        }  

        // Valida el tipo MIME  
        if (!in_array($tipoArchivo, $tipoMIMEPermitidos)) {  
            die("Error: Tipo de archivo no válido.");  
        }  

        // Valida el tamaño del archivo  
        $limiteTamaño = 2 * 1024 * 1024; // 2 MB  
        if ($tamañoArchivo > $limiteTamaño) {  
            die("Error: El archivo es demasiado grande.");  
        }  

        // Si pasa todas las validaciones, mueve el archivo a la ubicación deseada  
        $directorioDestino = 'fotos_inm/'; 
        $NomArch = uniqid() . "-" . $codigoi . "." . $extencionArchivo;
        $rutaArchivo = $directorioDestino . $NomArch;  

        if (move_uploaded_file($archivoTemp, $rutaArchivo)) 
        {
            $consulta ="INSERT INTO fotos (codigoi,foto) VALUES ('$codigoi', '$NomArch');"; 
    
            if ($conn->query($consulta) === TRUE) {   
                $camino = "location:reg_foto.php?codigoi=" . $codigoi; 
                header($camino);
            } else {  
                echo "Error: '$conn->error'";  
            }  
//Muestra los mensajes de error si no se subiera las imagenes correctamente
            echo "La imagen se ha subido correctamente: $rutaArchivo";  
        } else {  
            echo "Error: No se pudo mover el archivo.";  
        }  
    } else {  
        echo "Error: No se ha subido ningún archivo o ha ocurrido un error.";  
    }  
}  
?>  
