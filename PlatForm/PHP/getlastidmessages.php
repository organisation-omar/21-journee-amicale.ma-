<?php
require_once("../../PHP/conexion.php");
$res=mysqli_query($conexion,'SELECT id from messageroms ORDER BY id DESC LIMIT 1');
$var=null;

while($row=mysqli_fetch_array($res)){
   $var=$row[0];

    }


echo $var;




?>