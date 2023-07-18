<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question résultat</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>   
    <link rel="stylesheet" href="./css/msg.css?n:0.02">
    <link rel="stylesheet" href="./css/GlobaleColor.css?n:0.01">
    <link rel="stylesheet" href="css/stylelaboMsg.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script >
       $(document).ready(function(){
            var apiKey = '5tpmnXbPCslksPMX1FtNVR6eJlkrD6NMrM57Phl0'; //Demo key, get yours at piesocket.com
            var channelId = 1;
            var websocket = new WebSocket(`wss://connect.websocket.in/v3/${channelId}?api_key=${apiKey}`);
                websocket.onmessage = function(event){
                    var Data = JSON.parse(event.data);

                        if(Data.action=="loidmessage"){
                            var id=Data.id;
                            var from=Data.from;
                            var msg=Data.msg;
                            var aa=Data.aa;
                            var typemsg=Data.typemsg;
                            getnouvaeumsgv2(id,from,msg,aa);
                        }

            }



        });



     </script>







</head>



<body style="background:#efedee">

    <button id="myBtn" style="height: 55px; width: 57px;font-size: 25px; " > <i class="fas fa-arrow-up"></i> </button>
    <!-- <header><img src="../img/hd.jpg"  width="100%" alt=""> </header>  -->

    <input type="hidden"  value="1" id="id">
    <div class="text">Question  résultat</div>
    <div class="contentMessage" id="contentjour" >

        <?php
            require_once "../PHP/conexion.php";
            $msg='';
            $res=mysqli_query($conexion,"SELECT * from messageroms where active not like '0'  ORDER BY id desc");
            while($row=mysqli_fetch_array($res)){
                $msg.=' <div class="chat">
                            <div class="profile">
                            <img class="img" src="./img/msg.png" >
                            </div>                  
                            <div class="message">
                            '.$row[3].'  <br>
                            <!--<strong> À :</strong>
                            <span style="color: red;">'.$row[4].'</span>-->
                            <span class="timeres">'.$row[6].'</span>
                            </div>
                            <div class="user">'.$row[1].'</div>
                            <span class="remove" onclick="deletemessage(this,'.$row[0].')"> <i class="fa fa-trash" ></i> </span>

                        </div>';



            }
            echo $msg;
        ?>

       

    </div>
    <script src="./E-poster/js/js.js"></script>
    <script src="js/main.js"></script>
   


</body>



</html>