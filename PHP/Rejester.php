<?php
require("./mail.php");
include 'conexion.php';
$Nom=isset($_POST["Nom"])?$_POST["Nom"]:"Vide";
$prenom=isset($_POST["prenom"])?$_POST["prenom"]:"Vide";
$secteur=isset($_POST["secteur"])?$_POST["secteur"]:"Vide";
$ville=isset($_POST["ville"])?$_POST["ville"]:"Vide";
$email=isset($_POST["email"])?$_POST["email"]:" ";
$telephone=isset($_POST["tel"])?$_POST["tel"]:"Vide";
$membre=isset($_POST["membre"])?$_POST["membre"]:"Vide";
$res1=mysqli_query($conexion,"SELECT id from rejistration where  email like'$email'");
while($row1=mysqli_fetch_array($res1))
    $id=$row1[0];

        if(empty($id)){
            session_start();
            $requet1='insert into rejistration(id,Nom,Prenom,secteur,membre,ville,email,telephone) values(null,"'.$Nom.'","'.$prenom.'","'.$secteur.'","'.$membre.'","'.$ville.'","'.$email.'","'.$telephone.'")'; 
            $rej=mysqli_query($conexion,$requet1);
            /***send mail */
            if($rej==1){
             
                sendMsg($email,$Nom,$prenom);
            }
        }

        else{
            session_start();
            header('Location: ../index.php?er=1');


        }



?>