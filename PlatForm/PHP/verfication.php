<?php

session_start();
if(!isset($_SESSION['op']) || !$_SESSION['op']  ){

    header('Location: ../index.php');

}


?>