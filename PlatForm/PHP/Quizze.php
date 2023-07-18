<?php
require_once("../../PHP/conexion.php");
$op=isset($_POST["op"])?$_POST["op"]:" ";
$rep=isset($_POST["rep"])?$_POST["rep"]:" ";
$user=isset($_POST["user"])?$_POST["user"]:" ";
$Questionnum=isset($_POST["Questionnum"])?$_POST["Questionnum"]:" ";

$list=array();
$list1=array();

if($op==1){

     $all='SELECT user FROM quizze where user="'.$user.'" and questionnum='.$Questionnum.' ';
     $alls=mysqli_query($conexion,$all);
     while($row=mysqli_fetch_array($alls))
       $username=$row[0];

       if( empty($username)){
              $requet='insert into quizze values(null,"'.$rep.'",'.$Questionnum.',"'.$user.'")';
               $res1=mysqli_query($conexion,$requet) or die('problem');
               $data=$res1;
       }

       else
       $data=-1;
          




}

else if($op==2){
     /*************POUR recupérer tout les choix**********/
     $rq2='SELECT DISTINCT reponse FROM quizze WHERE   questionnum='.$Questionnum.' ';
     $res2=mysqli_query($conexion,$rq2);
     while($row=mysqli_fetch_array($res2)){
          array_push($list,array("rep"=>$row[0]));

     }

     /*************POUR recupérer le nombre de chaque choix de response **********/

     for($j=0;$j<count($list);$j++)
     {

               $rq3='SELECT count(*),reponse,TRUNCATE((count(*)*100)/(SELECT count(*) FROM quizze WHERE questionnum='.$Questionnum.' ),2) as my  FROM quizze WHERE reponse="'.$list[$j]["rep"].'" and QuestionNum='.$Questionnum.'  order by my DESC';
               $res3=mysqli_query($conexion,$rq3);

               while($row=mysqli_fetch_array($res3))
               {

                    array_push($list1,array("rep"=>$row[1],"porsontag"=>$row[2]));
               }

     }


     $var="";
     for($i=0;$i<count($list1);$i++){

          $var.='<div class="bar">
                    <div class="info">
                    <span>'.$list1[$i]["rep"].'</span>
                    </div>
                    <div class="progress-line '.$list1[$i]["rep"].'">
                       <span style="width:'.$list1[$i]["porsontag"].'%;"></span>
                         <style>
                              .progress-line.'.$list1[$i]["rep"].' span::after{
                              content: "'.$list1[$i]["porsontag"].'%"
                              }
                         </style>

                    </div>
                 </div>';

     }
     $data=$var;


}




echo $data;

?>