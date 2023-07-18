<?php 
$mail=isset($_GET["mail"])?$_GET["mail"]:"";

function  verfier($email){
  require "./PHP/conexion.php";
  $rq='SELECT id,Nom,Prenom,email from rejistration where email like "'.$email.'" ';
  $res=mysqli_query($conexion,$rq);
  $list=null;
  while($row=mysqli_fetch_array($res)){
      if($row[0]>0)
      $list=array($row[0],$row[1],$row[2],$row[3]);
     
  }


  return $list;
  
  

}

$Data=verfier($mail);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérification de compte</title>
    <link rel="stylesheet" href="Style/css.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>


    $(document).ready(function(){
            /*var apiKey = '5tpmnXbPCslksPMX1FtNVR6eJlkrD6NMrM57Phl0';
            var channelId = 1;
            var websocket = new WebSocket(`wss://connect.websocket.in/v3/${channelId}?api_key=${apiKey}`);


            websocket.onopen = function(event){   
                console.log("Connection is established!");
                var id="<?php echo $Data[0];?>";               
                   if(id!=""){
                    iduser="<?php echo $Data[3] ?>";
                        var messageJSON = {
                            action:"logintest",
                            message: iduser
                        };
                 
                        
                   // websocket.send(JSON.stringify(messageJSON));
                   }      
                   else window.location.href='./index.php?er=-1';

                   
                    

            }

            websocket.onmessage = function(event){
              var Data = JSON.parse(event.data);

                if(Data.action=="login" && Data.msg=="oui" ){

                        window.location.href="./index.php?er=3";
                        localStorage.removeItem('compt');

                }

            }*/
            
            setTimeout(function(){
                
                   var Nom="<?php echo $Data[1]; ?>",
                       Prenom="<?php echo $Data[2]; ?>",
                       email="<?php echo $Data[3]; ?>";
                       window.location.href='./login.php?Nom='+Nom+'&Prenom='+Prenom+'&email='+email+'';
                    
            
            },7000);


    });

    </script>
</head>
<body >


  
<div class="wrap-loader">
  <div class="loader">
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="box"></div>
    <div class="wrap-text"> 
      <div class="text"><span>7</span><span>6</span><span>5</span><span>4</span><span>3</span><span>2</span><span>1</span><span>0</span>
      </div>
    </div>
  </div>
  <div class="loader-text">Veuillez attendre la vérification de votre compte , s'il vous plaît</div>
</div>


</body>
</html>

