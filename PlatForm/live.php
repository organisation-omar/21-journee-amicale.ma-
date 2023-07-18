
<!DOCTYPE html>
<html lang="fr">
<head>
  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <title>Live</title>
    <!------------------------------------------------>
       <link rel="stylesheet" href="css/css.css?n:0.11">
       <!-------------La chatgraphi------------------>
       <link rel="stylesheet" href="./css/GlobaleColor.css?n:0.03">
    <!-------------------------------------------------------->
       <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-------------------------------------------------------->
      
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>           
            <script src="js/glightbox.min.js" id="glightbox"></script>       
            <script src="./js/bootstrap.bundle.min.js"></script>
    <!------------------------------------------------------------------------------------------->
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

   

    <script>
        setTimeout( function(){
        $('#leader1').fadeToggle();
            },1500);



        $(document).ready(function(){
            var infouser=getcompt();
            
              var apiKey = '5tpmnXbPCslksPMX1FtNVR6eJlkrD6NMrM57Phl0'; 
              var channelId = 1;
              var websocket = new WebSocket(`wss://connect.websocket.in/v3/${channelId}?api_key=${apiKey}`);            
                websocket.onopen = function(event) { 
                    console.log("Connection is established!");
                  
                }
                websocket.onmessage = function(event) {
                      var Data = JSON.parse(event.data);
                      if(Data.action=="commencerlive" && Data.sale=="21"){                   
                        commencerlelive(Data.sale);
                        
                      }

                     

                                          
                     else if(Data.action=="logintest"){
                               var infouser=getcompt();
                               var id=infouser[0].email;
                                if(Data.message==id){
                                        var msg="oui";
                                        var messageJSON = {
                                            action:"login",
                                            msg: msg
                                        };
                                    websocket.send(JSON.stringify(messageJSON)); 
                                }
                        
                      }

          
               
                }



                websocket.onerror = function(event){
                    console.log("Problem due to some Error");
                };
                websocket.onclose = function(event){
                    console.log("Problem due to some Error");
                };

            /*/////////////////Partie Message/////////////////////*/
              $('#frmesg').on("submit",function(event){
                  event.preventDefault();
                  var compt=localStorage.getItem("compt");
                  var tab=JSON.parse(compt);
                  var from=tab.user;
                  var aa= "Modérateur";
                  var sale=document.getElementById("jourupdate").value;
                  var msg=document.getElementById("msgenvoyer").value;
                                var ttc = new XMLHttpRequest();
                                    ttc.onreadystatechange=function(){
                                        if(this.status==200 && this.readyState==4){
                                                var data=this.responseText;
                                                  if(data==""){
                                                    data=0;
                                                  }
                                                var id=parseInt( parseInt(data)+1);
                                                var messageJSON = {
                                                      action:"loidmessage",
                                                      msg:msg,
                                                      aa:aa,
                                                      from:from,
                                                      id:id,
                                                      sale:sale
                                                };

                                             
                                              document.forms[0].reset();
                                              sendmessage(id,from,sale,msg,aa);
                                              msgsender(msg);
                                              websocket.send(JSON.stringify(messageJSON));
                                        }
                                    }
                                    ttc.open("GET",'./PHP/getlastidmessages.php',true);
                                    ttc.send();

                  
              });

            /******************************************************/

        });




    </script>

   <style>
       .arrow::before {
        top: 0;
        border-width: .4rem .4rem 0;
        border-top-color: #e3e3e3 !important;
        }
        video{
            max-width: 100% !important;

    background:white !important;

        }
   </style>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

</head>

<body onload="commencerlelive('21'); " >
  <!-- <div class="leader1" id="leader1" ><div class="a22"></div></div> -->
  <input type="hidden" id="jourupdate" value="21" ><!--Sale ID-->
  <input type="hidden" id="qn" value="1" ><!--Quiz_N°-->


    

 
 


   
          
         <!-- lien de live -->
             <a hidden id="cmclive" class="glightbox"></a>
            <div  class="content">
                
                <a id="myBtnreteur"  >  
                       <i class="fas fa-reply " ></i> 
                        <div style="position: relative;">
                                <div class="tooltip fade bs-tooltip-top show" role="tooltip" id="tooltip834662" style="position: absolute;left:1vmin;bottom:8vmin;z-index: 14;" x-placement="top">
                                            <div class="arrow" style="left: 25px;"></div>
                                            <div class="tooltip-inner" style="font-size:2.5vmin;font-weight: bold;background-color: #e3e3e3;color: #1e9cc1;text-shadow: 1px 2px 2px #43608dc9;">  Retour </div>
                                </div>
                        </div>

                </a>

                            <!-- Quiz block -->
                <a id="btnquizze" > Quiz  <span> </a>

                <div id="tele" class="iphone-x">

                    <div class="screen">
                    
                        <div class="top-nav"></div>

                        <form class="calculator container">

                            <input type="text" placeholder='' disabled name="displayResult" class="area"/>
                            <span class="removerep"><i class="fas fa-times"></i></span>
                            <div class="key container" id="keyBoard">

                            

                                <div class="fourth-col">
                                    <div class="button"><button type="button" name="" value="A" class="btn-work" onclick="calcNumbers(this.value)" >A</button></div>
                                </div>

                                <div class="fourth-col">
                                    <div class="button"><button type="button" name="" value="B"   class="btn-work" onclick="calcNumbers(this.value)" >B</button></div>
                                </div>

                                <div class="fourth-col">
                                    <div class="button"><button type="button" name="" value="C"   class="btn-work" onclick="calcNumbers(this.value)">C</button></div>
                                </div>

                                <div class="fourth-col">
                                    <div class="button"><button type="button" name="" value="D"   class="btn-work" onclick="calcNumbers(this.value)">D</button></div>  
                                </div>


                            </div>

                        </form>

                        <div class="btnvalidrep"> Valider </div>

                    </div>

                </div>
                       
                

               
                          
                          
                              <img src="./img/imglive_page3.jpg" alt="">
                                <div class="lefttop">
                                 <i class="fas fa-volume-mute logo" style="display: none;" onclick="logo()"></i>

                                    <div id="contentvedio">
                                   
                                    </div>
                                  
                                </div>


                                        <input type="checkbox" id="click">
                                        <div for="click" onclick="return document.getElementById('click').click();" class="typing-indicator label" aria-describedby="tooltip834662">
                                           
                                         
                                                <div class="tooltip fade bs-tooltip-top show" role="tooltip" id="tooltip834662" style="position: absolute;right:1%;bottom:8vmin;z-index: 14;" x-placement="top">
                                                    <div class="arrow" style="right: 25px;"></div>
                                                    <div class="tooltip-inner" style="font-size: 2.5vmin;width: 38vmin;font-weight: bold;background-color: #e3e3e3;color: #1e9cc1;text-shadow: 1px 2px 2px #43608dc9;">  Posez Vos  Questions </div>
                                                </div>
                                        

                                             <i class="fas fa-times"></i>
                                            <div style="display: block;" class="fab">
                                                <span ></span>
                                                <span ></span>
                                                <span ></span>
                                            </div>
                                            
                                        </div>

                                        <div class="wrapper1">
                                            <div class="head-text">  Posez Vos  Questions </div>
                                            <div class="chat-box">
                                                <div class="boitmsg" id="boitmsg">    
                                                <!-- Block des messages  -->
                                                </div>

                                                <form id="frmesg" name="frmesg"  method="Post" >
                                                    <div class="field">
                                                    <input type="text"  id="msgenvoyer" autocomplete="off"  placeholder="Écrivez votre message ici" required>
                                                    <button type="submit"><i class="fas fa-paper-plane s"></i></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        
                                            
                                        




                                       





                            

            </div>


            <div class="vdinverse">
           
               <video src="./img/Inverse-1.mp4" id="liveinvers"  ></video> 
            </div>
            



              <script>

                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)

                });

              </script>

<script src="js/main.js?v:0.06"></script> 
<script src="js/quize.js?v:0.09"></script> 


</body>

</html>