<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8"> <!-- Codificación de caracteres -->
    <!-- Enlaces a hojas de estilo -->
    <link rel="stylesheet" href="/CSS/style1.css"> <!-- Estilo principal -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="/CSS/formulario1.css"> <!-- Estilos para formulario -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> <!-- Iconos Boxicons -->
    <title>Document</title> 
</head>
<body>
    <!-- Encabezado con logo -->
    <div class="header">
        <img height="60px" width="auto" src="/img/URBANOVA_text.png" alt="">
    </div><br><br> <!-- Espacios adicionales -->

    <!-- Contenedor principal del formulario -->
    <div class="container">
        <div class="wrapper">
          <div class="title"><span>Registro de Usuario</span></div> <!-- Título del formulario -->
          
    <!-- Formulario de registro que envía datos a per_guardar.php -->
    <form action="per_guardar.php" method="post">
      <?php
          // Obtiene el tipo de usuario desde la URL y lo guarda en campo oculto
          $tipo = $_GET['tipo'];
          echo("<input type='hidden' value='$tipo' name='tipo' id='tipo'>")
      ?>          
        <!-- Campo para nombre -->
        <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="nombre" name="nombre" required size="25" placeholder="Nombre" required>
          </div>
          <!-- Campo para apellido paterno -->
          <div class="row">
            <i class="fas fa-lock"></i>
            <input type="text" id="ap_paterno" name="ap_paterno" required size="25" placeholder="Apellido Paterno" required>
          </div>
          <!-- Campo para apellido materno -->
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="ap_materno" name="ap_materno" required size="25" placeholder="Apellido Materno" required>
          </div>
      
          <!-- Campo para email -->
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="email" id="email" name="email" required size="50" placeholder="Email" required>
          </div>
          <!-- Campo para teléfono -->
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="fono" name="fono" required size="15" placeholder="Telefono" required>
          </div>          
          <!-- Campo para dirección -->
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="direccion" name="direccion" required size="25" placeholder="Direccion" required>
          </div>
        
          <!-- Campo para nombre de usuario -->
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" id="user" name="user" required size="25" placeholder="Usser" required>
          </div>
          <!-- Campo para contraseña -->
          <div class="row">
            <i class="fas fa-user"></i>
            <input type="password" id="password" name="password" required size="25" placeholder="Contraseña" required>
          </div>
          <!-- Botón de enviar -->
          <div class="row button">
            <input type="submit" value="Crear">
          </div>
          <!-- Botón de resetear -->
          <div class="row button">
            <input type="reset" value="Cancelar">
          </div>
        </form> 
    </div>
    </div>
  
</body>
</html>