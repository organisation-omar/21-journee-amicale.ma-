<?php

$Nom=isset($_GET['Nom'])?$_GET['Nom']:'';
$Prnom=isset($_GET['Prenom'])?$_GET['Prenom']:'';
$email=isset($_GET['email'])?$_GET['email']:'';
session_start();
$_SESSION['op']=true;
$_SESSION['Nom']=$Nom;
$_SESSION['Prenom']=$Prnom;
$_SESSION['email']=$email;


header('Location: ./PlatForm/index.php');

?>