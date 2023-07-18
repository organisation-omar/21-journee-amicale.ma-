<?php
require_once("../../PHP/conexion.php");
date_default_timezone_set('GMT/UTC');
$datesourtir = date('d/m/Y _/_ H:i:s (A)');
$NomUti=isset($_POST['NomUti'])?$_POST['NomUti']:"";
$resultat3=mysqli_query($conexion,'UPDATE tempsdutilisation set dateSourtir="'.$datesourtir.'" where NomUtilisateur="'.$NomUti.'" and  dateSourtir is null ') or die("probleme  fermer !!");
$data=$resultat3;
mysqli_close($conexion);
echo $data;


?>