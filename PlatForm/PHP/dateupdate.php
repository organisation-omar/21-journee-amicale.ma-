<?php
require_once("../../PHP/conexion.php");
date_default_timezone_set('GMT/UTC');
$date = date('d/m/Y _/_ H:i:s (A)');
$NomUti=isset($_POST['NomUti'])?$_POST['NomUti']:"";
$page=isset($_POST['page'])?$_POST['page']:"";

$res=null;
$res1=null;

$cher=mysqli_query($conexion,"SELECT * FROM tempsdutilisation " ) or die("problem de chargement!!");
while($row1=mysqli_fetch_array($cher))
       $res=$row1[0];


if($res==null){
    $resultat=mysqli_query($conexion,'insert into tempsdutilisation values(null,"'.$NomUti.'","'.$date.'",null,"'.$page.'")') or die("Problem ,d'ajout !!");
        $data=$resultat;
        mysqli_close($conexion);
        echo $data;
           }



else{
    
    $cher2=mysqli_query($conexion,'SELECT dateSourtir FROM tempsdutilisation  where NomUtilisateur="'.$NomUti.'"');
       while($row1=mysqli_fetch_array($cher2))
       $DateS=$row1[0];

   if($DateS!=null){
     $resultat1=mysqli_query($conexion,'insert into tempsdutilisation values(null,"'.$NomUti.'","'.$date.'",null,"'.$page.'")') or die("Problem ,d'ajout !!");
        $data=$resultat1;
        mysqli_close($conexion);
        echo $data;
                   }

    else{
        $resultat2=mysqli_query($conexion,'UPDATE tempsdutilisation set dateSourtir="'.$date.'" where NomUtilisateur="'.$NomUti.'" and  dateSourtir is null  ') or die("probleme !!");
    
        $res1=mysqli_query($conexion,'insert into tempsdutilisation values(null,"'.$NomUti.'","'.$date.'",null,"'.$page.'")') or die("Problem ,d'ajout !!");
        $data=$res1;
        mysqli_close($conexion);
        echo $data; 
       }

}
?>