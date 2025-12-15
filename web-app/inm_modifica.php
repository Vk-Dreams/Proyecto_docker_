<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración básica del documento HTML -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Hoja de estilos para el formulario -->
    <link rel="stylesheet" href="/CSS/formulario1.css">    
    <title>Document</title> <!-- Título genérico (debería ser más descriptivo) -->
</head>
<body>
    <!-- Encabezado con logo de la empresa -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="Logo Urbanova">
    </div><br><br>

    <!-- Contenedor principal del formulario -->
    <div class="container">
        <div class="wrapper">
          <div class="title"><span>Registro de un Inmueble</span></div>
          
          <!-- Formulario para actualizar datos del inmueble -->
          <form action="inm_actualizar.php" method="post">
            <?php
            // Conexión a la base de datos
            include "conectar.php";
            
            // Obtención de parámetros desde la URL
            $codigoi = $_GET['codigoi']; // ID del inmueble a editar
            $codigop = $_GET['codigop']; // ID del propietario
            
            // Campos ocultos para enviar estos valores
            echo("<input type='hidden' value='$codigoi' name='codigoi' id='codigoi'>");
            echo("<input type='hidden' value='$codigop' name='codigop' id='codigop'>");
            
            // Consulta para obtener datos actuales del inmueble
            $consulta ="select * from inmueble where codigoi = '$codigoi'";
            
            if ($resultado = $conn->query($consulta)) {
                $fila = $resultado->fetch_assoc();
            ?>
            
            <!-- Campos del formulario con valores actuales -->
            <div>
                <i class="fas fa-lock"><p>DIRECCION</p></i>
            </div>
            <div class="row">
                <i class="fas fa-lock"></i>
                <input type="text" id="direccion" name="direccion" required size="50" placeholder="Direccion" value="<?php echo $fila['direccion']?>" required>
            </div>
            <div>
            <i class="fas fa-lock"><p>HABITACIONES</p></i>
          </div>
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="text" id="habitacion" name="habitacion" required size="5"placeholder="Habitaciones" value="<?php echo $fila['habitaciones']?>" required>
          </div>
          <div>
            <i class="fas fa-lock"><p>BAÑOS</p></i>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="banos" name="banos" required size="5" placeholder="Baños" value="<?php echo $fila['banos']?>" required>
          </div>
          <div>
            <i class="fas fa-lock"><p>METROS CUADRADOS TERRENO</p></i>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="mts2" name="mts2" required size="7" placeholder="Metros Cuadrados Terreno" value="<?php echo $fila['m2']?>" required>
          </div>
          <div>
            <i class="fas fa-lock"><p>METROS CONSTRUIDOS</p></i>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="mtsc" name="mtsc" required size="7" placeholder="Metros Construidos" value="<?php echo $fila['m2c']?>" required>
          </div>
          <div>
            <i class="fas fa-lock"><p>PRECIO</p></i>
          </div>
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="precio" name="precio" required size="10" placeholder="Precio" value="<?php echo $fila['precio']?>" required>
          </div>
          <br>
            <!-- Selección de tipo de inmueble con valores actuales -->
            <div class="big"><label for="">Tipo de Inmueble</label></div>
            <div class="option">
                <i class="fas fa-user"></i>
                <input type="radio" id="contactChoice1" name="tipo" value="D" <?php echo ($fila['tipo'] == 'D' ? 'checked' : '');?> />
                <label for="contactChoice1">Departamento</label>

                <input type="radio" id="contactChoice2" name="tipo" value="C" <?php echo ($fila['tipo'] == 'C' ? 'checked' : '');?> />
                <label for="contactChoice2">Casa</label>

                <input type="radio" id="contactChoice2" name="tipo" value="T" <?php echo ($fila['tipo'] == 'T' ? 'checked' : '');?> />
                <label for="contactChoice2">Terreno</label>
            </div>
            
            <!-- Área de texto para descripción -->
            <div class="big"><label for="">Descripción del Inmueble</label></div>
            <textarea id="descrip" name="descrip" minlength="10" maxlength="600" required cols="80" rows="10"><?php echo $fila['descripcion']?></textarea>
            
            <!-- Botones de acción -->
            <div class="row button">
                <input type="submit" value="Modificar">
            </div>
            <div class="row button">
                <input type="reset" value="Reiniciar">
            </div>
            
            <!-- Formulario adicional para cancelar (con error de sintaxis) -->
            <form action="home.html">
                <div class="row button">
                    <input type="submit" value="Cancelar">
                </div>  
            </form>
            
            <?php } // Cierre del if y del bloque PHP ?>
          </form>
</body>
</html>