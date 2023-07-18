<?php
require_once("../../PHP/conexion.php");
$op=isset($_POST["op"])?$_POST["op"]:" ";
$id=isset($_POST["id"])?$_POST["id"]:" ";
$aa=isset($_POST["aa"])?$_POST["aa"]:" ";
$from=isset($_POST["from"])?$_POST["from"]:" ";
$msg=isset($_POST["msg"])?$_POST["msg"]:" ";
$sale=isset($_POST["sale"])?$_POST["sale"]:" ";
$too=isset($_POST["too"])?$_POST["too"]:" ";
$type=isset($_POST["type"])?$_POST["type"]:" ";
$time=isset($_POST["time"])?$_POST["time"]:" ";


$data=null;
$var="moderateur";
$list=array();

    

if($op==1){  
$res1=mysqli_query($conexion,'insert into messageroms values('.$id.',"'.$from.'","1","'.$msg.'","'.$aa.'","'.$type.'","'.$time.'")') or die('problem');  
$data=$res1;
}


else if($op==2){
     $requet2='UPDATE messageroms set active="0"  where id='.$id;
     $res3=mysqli_query($conexion,$requet2) or die('problem');
     $data=$res3;
}


echo $data;

?>