<?php
// Incluye el archivo de conexión a la base de datos
include "conectar.php";

// Consulta SQL para buscar un usuario específico
$consulta = "select * from persona WHERE user = '$_GET[usuario]'"; 
// Ejecuta la consulta en la base de datos
$resultado = $conn->query($consulta); 
// Obtiene los resultados como un array asociativo
$fila = $resultado->fetch_array();

// Obtiene la contraseña del formulario y de la base de datos
$clave_form = $_GET['cla'];
$clave_BD = $fila['passwd'] ?? '';

// Verifica si la contraseña coincide usando password_verify
if (password_verify($clave_form, $clave_BD))
{
    // Si el usuario existe en la base de datos
    if ($fila) {
        // Redirecciona según el tipo de usuario
        switch ($fila['tipo_user']) {
            case "C":
                // Redirección para usuarios tipo "C"
                echo "<script type='text/javascript'>if (window!= window.top) top.location.href = 'menuc.php?codigo_per=".$fila['codigo_per']."';</script>";
                break;
            case "V":
                // Redirección para usuarios tipo "V"
                echo "<script type='text/javascript'>if (window!= window.top) top.location.href = 'menuv.php?codigo_per=".$fila['codigo_per']."';</script>";
                break;
            default:
                // Mensaje para tipos de usuario no reconocidos
                echo "no se encontro ese tipo de usuario....";
        }
    } else {
        // Redirección cuando no se encuentra el usuario
        header('location:clave1.html', true);
        // Mensaje de alerta
        echo "<script language='javascript'> alert('No Existe')</script>";
    }
}
else
{
    // Mensaje cuando la contraseña no coincide
    echo "<script> alert('USUARIO O CONTRASEÑA INCORRECTA INTENTELO DE NUEVO')</script>";
    // Redirección a la página de login
    echo "<script>window.location.href = 'clave1.html'</script>";
}
?>