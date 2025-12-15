<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hoja de estilos para el formulario -->
    <link rel="stylesheet" href="/CSS/formulario1.css">    
    <title>Document</title> <!-- Título genérico-->
</head>
<body>
    <!-- Encabezado con logo -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="Logo URBANOVA">
    </div><br><br>

    <!-- Contenedor principal del formulario -->
    <div class="container">
        <div class="wrapper">
          <div class="title"><span>Registro de un Inmueble</span></div>
          
          <!-- Formulario que enviará datos a inm_registrar.php -->
          <form action="inm_registrar.php" method="post">
            <?php
            // Obtiene el código del propietario desde la URL
            $codigop = $_GET['codigop'];
            // Crea campo oculto para enviar este valor
            echo("<input type='hidden' value='$codigop' name='codigop' id='codigop'>")
            ?>
            
            <!-- Campos del formulario -->
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" id="direccion" name="direccion" required size="50" placeholder="Direccion" required>
            </div>
            
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="text" id="habitacion" name="habitacion" required size="5" placeholder="Habitaciones" required>
            </div>
            
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" id="banos" name="banos" required size="5" placeholder="Baños" required>
            </div>
            
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" id="mts2" name="mts2" required size="7" placeholder="Metros Cuadrados Terreno" required>
            </div>
            
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" id="mtsc" name="mtsc" required size="7" placeholder="Metros Construidos" required>
            </div>
            
            <div class="row">
                <i class="fas fa-user"></i>
                <input type="text" id="precio" name="precio" required size="10" placeholder="Precio" required>
            </div>
            
            <br>
            <!-- Selección de tipo de inmueble -->
            <div class="big"><label for="">Tipo de Inmueble</label></div>
            <div class="option">
                <i class="fas fa-user"></i>
                <input type="radio" id="contactChoice1" name="tipo" value="D" />
                <label for="contactChoice1">Departamento</label>

                <input type="radio" id="contactChoice2" name="tipo" value="C" />
                <label for="contactChoice2">Casa</label>

                <input type="radio" id="contactChoice2" name="tipo" value="T" />
                <label for="contactChoice2">Terreno</label>
            </div>
            
            <br>
            <!-- Área de texto para descripción -->
            <div class="big"><label for="">Descripción del Inmueble</label></div>
            <textarea id="descrip" name="descrip" minlength="10" maxlength="600" required cols="80" rows="10"></textarea>
            
            <br><br>
            <!-- Botones de acción -->
            <div class="row button">
                <input type="submit" value="Crear">
            </div>
            <div class="row button">
                <input type="reset" value="Cancelar">
            </div>
          </form>
</body>
</html>