<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8">
    <title>URBANOVA | HOME</title>
    <!-- Enlace a hoja de estilos CSS -->
    <link rel="stylesheet" href="/CSS/style1.css">
    <!-- Enlace a iconos Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- Configuración de viewport para responsive design -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
        // Conexión a la base de datos y consulta de datos del usuario
        include "conectar.php";
        $codigop = $_GET['codigo_per'];
        $consulta ="select nombre,ap_paterno,ap_materno from persona where codigo_per = '$codigop'";
        if ($resultado = $conn->query($consulta)) {
            $fila = $resultado->fetch_assoc();
    ?>
  <!-- Barra lateral de navegación -->
  <div class="sidebar">
    <div class="logo-details">
      <!-- Logo de la empresa -->
      <div class="logito"><img height="65px" width="auto" src="/img/logo_urbanova.png" alt=""></div>
      <!-- Nombre de la empresa con enlace a inicio -->
      <a href="index.html"><div class="logo_name"><img height="27px" width="auto" src="/img/URBANOVA_text.png" alt=""></div></a>
        <!-- Botón para expandir/contraer menú -->
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <!-- Lista de opciones del menú -->
    <ul class="nav-list">
      <!-- Elemento con información del usuario -->
      <li>
        <a href="#" onclick="document.getElementById('ventana').src='';">
          <i class='bx bx-user-circle'></i>
          <span class="links_name"><?php  echo $fila['nombre']." ". $fila['ap_paterno']." ".$fila['ap_materno'];?></span>
        </a>
         <span class="tooltip"><?php echo $fila['nombre']; }?></span>
      </li>
      <!-- Formulario de búsqueda -->
      <li>
        <form id="busc">
          <input type="text" name="buscar" placeholder="Search..." required>
          <button type="submit" style="background: none; border: none;">
              <i class='bx bx-search'></i>
          </button>
          <span class="tooltip">Buscar</span>
      </form>
      </li>
      <!-- Script para manejar la búsqueda con AJAX -->
      <script>
        document.getElementById('busc').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita el envío tradicional del formulario

            const formData = new FormData(this); // Crea objeto FormData
            document.getElementById('ventana').src = 'about:blank';  

            fetch('busc.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                const iframe = document.getElementById('ventana'); 
                const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                iframeDocument.body.innerHTML = data; // Muestra resultados en el iframe
            })
            .catch(error => {
                console.error('Error:', error);
                const iframe = document.getElementById('ventana');
                const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                iframeDocument.body.innerHTML = 'Error uploading file.'; // Mensaje de error
            });
        });
    </script>
      <!-- Opción de menú Home -->
      <li>
        <a href="#" onclick="document.getElementById('ventana').src='home.php';">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <!-- Opción para registrar inmueble -->
      <li>
      <?php
        echo "<a href=\"#\" onclick=" . "\"document.getElementById('ventana').src='inm_formulario.php?codigop=" . $codigop . "';\">";
        ?>
          <i class='bx bxs-home-circle' ></i>
          <span class="links_name">Registrar Inmueble</span>
        </a>
        <span class="tooltip">Registrar Inmueble</span>
      </li>
      <!-- Opción para editar publicaciones -->
      <li>
      <?php
        echo "<a href=\"#\" onclick=" . "\"document.getElementById('ventana').src='inm_editar.php?codigop=" . $codigop . "';\">";
        ?>
          <i class='bx bxs-edit' ></i>
          <span class="links_name">Editar</span>
        </a>
        <span class="tooltip">Modificar Publicacion</span>
      </li>
      <!-- Opción para cerrar sesión -->
      <li>
        <a href="index.html"><i class='bx bx-log-out' ></i>
         <span class="links_name">Log out</span></div></a>
      </li>
    </ul>
  </div>
  <!-- Sección principal con iframe para contenido dinámico -->
  <section class="home-section">
          <div id="responseMessage" class="contenedor-responsivo"> 
        <iframe id="ventana" src="home.html" width="100%" height="100%" frameBorder="0" class="iframe-responsivo"></iframe> 
      </div>
  </section>
  <!-- Script para manejar la barra lateral -->
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//llamada a función para cambiar icono
  });
 
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//cambio de icono
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//cambio de icono
   }
  }
  </script>
</body>
</html>