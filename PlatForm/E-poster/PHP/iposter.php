<?php

require("../../../PHP/conexion.php");
$titre=isset($_POST["titre"])?$_POST['titre']:"";
$op=isset($_POST["op"])?$_POST['op']:"";
$var='';
$Requet="SELECT * FROM iposter";
if($op==1)
$Requet="SELECT * FROM iposter where titre like '%$titre%' ";

$Result=mysqli_query($conexion,$Requet) or die ("<h1 align='center' style='color:red;'>Problem de chargement réessayer !!</h1>");

while($row=mysqli_fetch_array($Result)){

   $var.='<div class="iposter ">
            <a href="https://admin.21-journee-amicale.ma/PDF/'.$row[2].'" class="portfolio-lightbox lien" data-gallery="portfolioGallery'.$row[0].'"  > <i>'.$row[1].'</i></a>
          </div>';
}

echo $var;









?>