<?php
//realiza la conexión al servidor
$servername = "db";   //El nombre del servicio DB en docker-compose
$username = "root";             
$password = "contra";         
$dbname = "proy";         

$conn = new mysqli($servername,$username,$password,$dbname);
//comprueba que la conexión se hizo con éxito
if (mysqli_connect($servername,$username,$password,$dbname)) {
    // echo "correcto..fffff";

}
else {
    echo "error de conexion";
}
?>