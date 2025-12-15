<!DOCTYPE html> <!-- Declaración del tipo de documento HTML5 -->
<html lang="en"> 
<head>
    <meta charset="UTF-8"> <!-- Establece la codificación de caracteres como UTF-8 -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- Configura la vista para dispositivos móviles -->
    <link rel="stylesheet" href="/CSS/formulario1.css"> <!-- Vincula la hoja de estilos externa formulario1.css -->
    <title>CARGADO DE FOTOS DE INMUEBLE</title> <!-- Título que aparece en la pestaña del navegador -->
</head>
<body>
<div class="container"> <!-- Contenedor principal de la página -->
    <div class="wrapper"> <!-- Contenedor interno para agrupar elementos del formulario -->
          <div class="title"><span>Ingrese la foto del inmueble</span></div> <!-- Título del formulario -->

  <form action="guarda_foto.php" method="post" enctype="multipart/form-data"> <!-- Formulario que envía los datos a guarda_foto.php mediante POST y permite subir archivos -->

  <?php
    $codigoi = $_GET['codigoi']; // Captura el valor 'codigoi' desde la URL (método GET)
    echo("<input type='hidden' value='$codigoi' name='codigoi' id='codigoi'>") // Genera un campo oculto con ese valor
  ?>

    <tr><td class="datos">FOTOGRAFIA</td> <!-- Fila de tabla con etiqueta "FOTOGRAFIA" -->
    <td class="etiqueta"><input type="file" name="imagen" id="imagen" required></td></tr> <!-- Campo de entrada para seleccionar una imagen, obligatorio -->

    <br><br> <!-- Saltos de línea -->

    <div class="row button"> <!-- Contenedor para el botón de envío -->
            <input type="submit" value="Subir fotografía"> <!-- Botón que envía el formulario -->
    </div>
</form> 
</div> 
</div> 
</body>
</html> 
