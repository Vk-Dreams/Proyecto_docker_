<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>URBANOVA | HOME</title>
    <link rel="stylesheet" href="/CSS/style1.css">
    <!-- Boxicons CDN Link - Proporciona iconos para la interfaz -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php
        // Incluye el archivo de conexión a la base de datos
        include "conectar.php";
        // Obtiene el código de persona desde la URL
        $codigop = $_GET['codigo_per'];
        // Consulta SQL para obtener los datos de la persona
        $consulta ="select nombre,ap_paterno,ap_materno from persona where codigo_per = '$codigop'";
        // Ejecuta la consulta
        if ($resultado = $conn->query($consulta)) {
            // Obtiene los datos de la persona
            $fila = $resultado->fetch_assoc();
    ?>
    <?php
        // Obtiene nuevamente el código de persona desde la URL
        $codigop = $_GET['codigo_per'];
    ?>
  <div class="sidebar">
    <div class="logo-details">
      <div class="logito"><img height="65px" width="auto" src="/img/logo_urbanova.png" alt=""></div>
     
      <a href="index.html"><div class="logo_name"><img height="27px" width="auto" src="/img/URBANOVA_text.png" alt=""></div></a>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list"> <!-- Menu de opciones -->
    <li>
        <!-- Muestra el nombre del usuario en la barra lateral -->
        <a href="#" onclick="document.getElementById('ventana').src='';">
          <i class='bx bx-user-circle'></i>
          <span class="links_name"><?php  echo $fila['nombre']." ". $fila['ap_paterno']." ".$fila['ap_materno'];?></span>
        </a>
         <span class="tooltip"><?php echo $fila['nombre']; }?></span>
      </li>
      <li>
        <!-- Formulario de búsqueda con funcionalidad AJAX -->
        <form id="busc">
          <input type="text" name="buscar" placeholder="Search..." required>
          <button type="submit" style="background: none; border: none;">
              <i class='bx bx-search'></i>
          </button>
          <span class="tooltip">Buscar</span>
      </form>
      </li>
      <script>
        // Maneja el envío del formulario de búsqueda mediante AJAX
        document.getElementById('busc').addEventListener('submit', function(event) {
            event.preventDefault(); // Previene el envío tradicional del formulario

            const formData = new FormData(this); // Crea un objeto FormData
            document.getElementById('ventana').src = 'about:blank';  

            // Envía la solicitud de búsqueda al servidor
            fetch('busc.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Muestra los resultados en el iframe
                const iframe = document.getElementById('ventana'); 
                const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                iframeDocument.body.innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
                const iframe = document.getElementById('ventana');
                const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;
                iframeDocument.body.innerHTML = 'Error uploading file.';
            });
        });
    </script>
      <li>
        <!-- Enlace a la página de inicio que carga contenido en el iframe -->
        <?php
        echo "<a href=\"#\" onclick=" . "\"document.getElementById('ventana').src='homec.php?codigo_per=" . $codigop . "';\">";
        ?>
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Home</span>
        </a>
         <span class="tooltip">Home</span>
      </li>
      <li>
     <li>
     <!-- Enlace a la página de guardados que carga contenido en el iframe -->
     <?php
        echo "<a href=\"#\" onclick=" . "\"document.getElementById('ventana').src='guardados.php?codigo_per=" . $codigop . "';\">";
        ?>
         <i class='bx bx-heart' ></i>
         <span class="links_name">Guardados</span>
       </a>
       <span class="tooltip">Guardados</span>
     </li>
      <li>
        <!-- Enlace para cerrar sesión -->
        <a href="index.html"><i class='bx bx-log-out' ></i>
         <span class="links_name">Log out</span></div></a>
      </li>
    </ul>
  </div>
  <section class="home-section">
          <!-- Contenedor principal donde se muestra el contenido dinámico en un iframe -->
          <div id="responseMessage" class="contenedor-responsivo"> 
        <iframe id="ventana" src="home.html" width="100%" height="100%" frameBorder="0" class="iframe-responsivo"></iframe> 
      </div>
  </section>
  <script>
  // Controla la apertura y cierre de la barra lateral
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  let searchBtn = document.querySelector(".bx-search");
  
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange(); // Cambia el icono del botón
  });
  
  // Función que cambia el icono del botón de menú
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");
   }
  }
  </script>
</body>
</html>