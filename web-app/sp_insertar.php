<?php
$nom = $_POST['nom'];
$ape = $_POST['ape'];

$cnx = mysqli_connect("localhost", "root", "", "dbprueba");
$sql = "INSERT INTO talumno(nom,ape)VALUES('$nom', '$ape')";
$rta = mysqli_query($cnx,$sql);
if(!$rta){
    echo "No se inserto";
}
else{
    header("Location: index.php");
}
?>