<?php
require_once("../../PHP/conexion.php");
$sale=isset($_POST['sale'])?$_POST["sale"]:"";
   $rq='SELECT url from live  where sale='.$sale.' ';
   $src=null;
   $res=mysqli_query($conexion,$rq) or die("probleme !!!!");
   while($row=mysqli_fetch_array($res))
   $src=$row[0];
  echo $src;

?>