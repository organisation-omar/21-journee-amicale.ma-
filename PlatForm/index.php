<?php
//require_once("./PHP/verfication.php");
session_start();
$op=isset($_SESSION["op"])?$_SESSION["op"]:" ";
$nom=isset($_SESSION["Nom"])?$_SESSION["Nom"]:" ";
$Prenom=isset($_SESSION["Prenom"])?$_SESSION["Prenom"]:" ";
$email=isset($_SESSION["email"])?$_SESSION["email"]:" ";
$ereur=isset($_GET['er'])?$_GET['er']:'';
$Nomcomplet=$nom." ".$Prenom;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
     


        <!--------------------css---------------------------->
            <link rel="stylesheet" href="./css/bootstrap.min.css">
            <link rel="stylesheet" href="./css/home.css">
            <link rel="stylesheet" href="./css/tolips.css?n:0.03">


            <link rel="stylesheet" href="./css/font-awsome.css">
            <link rel="stylesheet" href="E-stand/css/glightbox.min.css">
        <!--------------------------------------------------->
            <script>
                        $(document).ready(function(){
                            
                              userinfo('<?php echo $Nomcomplet;?>','<?php echo $email;?>');

                            if("<?php echo $ereur; ?>"=="-1"){
                                  $('.name').remove();
                                  $(".port").remove();
                            }
                            setTimeout(() => {
                                $(".name").fadeOut("slow");
                            }, 3000);
                            
                            var apiKey = '5tpmnXbPCslksPMX1FtNVR6eJlkrD6NMrM57Phl0';
                            var channelId = 1;
                            var websocket = new WebSocket(`wss://connect.websocket.in/v3/${channelId}?api_key=${apiKey}`);


                            websocket.onopen = function(event){    
                            console.log("pré");
                            }

                            websocket.onmessage = function(event){
                              var Data = JSON.parse(event.data);
                               

                                /*if(Data.action=="logintest"){
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
                          
                                }*/

                            }
                        
                      


                        });

            </script> 
            
            <style>
              
              .ipost{              
                top: 49%;
                right: 28%;
                width: 8%;
                height: 24%;
               
              }

              .pr{
                top: 50%;
                left: 28.8%;
                width: 8%;
                height: 22%;
              }

              .ouvert{
                position: absolute;
                width: 24%;
                height: 5.2%;
                top: 41%;
                left: 39%;
                color: white;
                text-align: center;
                font-weight: bold;
              }         
              
              
              
            </style>
            
</head>
<body >

<div class="square_box box_three"></div>
<div class="square_box box_four"></div>




      <div class="name">
        <p > Bienvenue  <?php echo $Nomcomplet; ?> </p>
      </div>


      <div class="port">
        
          
        <div style="position: relative;"> 
       
           <video src="./img/port1.mp4"   id="vd"  class="vd" ></video>

          <div class="ouvert" onclick="toggle(this);">
          
              <div class="outer circle">
                          <a class="bt" ><i> Participer aux journée</i></a>
                          <span></span>
                          <span></span>
              </div>
      
          </div>
        
        </div>
        
        

      </div>

     


     
      <div class="contenthome">
    
        <img src="./img/home4.jpg" width="100%" height="100%">
        <video src="./img/live.mp4" id="livevd"  ></video>
        <a  data-bs-toggle="tooltip" data-bs-placement="top" title="Salle de Conférence" class="link_live1"> </a>
                                <!-----------------------------------E-posters----------------------------->
        <a href="E-poster/index.php" data-bs-toggle="tooltip" data-bs-placement="top" title="E-posters" class="ipost link"></a>
                                <!-----------------------------------Programme----------------------------->
        <a href="img/programe1.jpg" class="portfolio-lightbox pr link" data-gallery="portfolioGallery"  data-bs-toggle="tooltip" data-bs-placement="top" title="Programme" ></a>
                                <!-----------------------------------Affiches----------------------------->
        <a href="img/af1.jpg" class="portfolio-lightbox af1 link" data-gallery="portfolioGallery1"   ></a>
        <a href="img/af2.jpg" class="portfolio-lightbox af2 link" data-gallery="portfolioGallery2"   ></a>

                                <!-- ---------------------------------E-standes------------------------------>


                                  
        <a href="E-stand/atlas.html"  class="link_stande9 link">
                                  <div class="icon twitter">
                                      <div class="tooltip">
                                        Atlas Pharm
                                        <img src="E-stand/repertoir_estandes/atlas/logo.png" width="50px"   alt="">
                                      </div>
                                    <span> </span>  
                                  </div>
      
        </a>

        <a href="E-stand/msd.html"  class="link_stande2 link">
        
          <div class="icon twitter">
            <div class="tooltip">
              MSD
              <img src="E-stand/repertoir_estandes/msd/logo.png" width="50px"   alt="">
            </div>
          <span> </span>  
          </div>

        </a>

        <a href="E-stand/astra.html"  class="link_stande3 link">
        
          <div class="icon twitter">
            <div class="tooltip">
              AstraZeneca
              <img src="E-stand/repertoir_estandes/astra/img.png" width="50px"   alt="">
            </div>
          <span> </span>  
          </div>
        
        
        </a>

        <a href="E-stand/sanofi.html"  class="link_stande1 link">
        
          <div class="icon twitter">
            <div class="tooltip">
              SANOFI
              <img src="E-stand/repertoir_estandes/SANOFI/Sanofi.svg.png" width="50px"   alt="">
            </div>
          <span> </span>  
          </div>

        </a> 

        <a href="E-stand/servier.html"  class="link_stande5 link">
          <div class="icon twitter">
            <div class="tooltip">
              Servier
              <img src="E-stand/repertoir_estandes/servier/logo.png" width="50px"   alt="">
            </div>
          <span> </span>  
          </div>

        </a>

        <a href="E-stand/buttu.html"  class="link_stande6 link">
          <div class="icon twitter">
            <div class="tooltip">
              Buttu
              <img src="E-stand/repertoir_estandes/bottu/logo.jpg" width="50px"   alt="">
            </div>
          <span> </span>  
          </div>

        </a>

        <a href="E-stand/sothema.html"  class="link_stande7 link">
        
          <div class="icon twitter">
            <div class="tooltip">
              Sothéma
              <img src="E-stand/repertoir_estandes/Sothema/logo.png" width="30px"   alt="">
            </div>
          <span> </span>  
          </div>

        
        </a> 

        <a href="E-stand/pharmaCare.html"  class="link_stande8 link">
        
          <div class="icon twitter">
            <div class="tooltip">
              Pharma Care
              <img src="E-stand/repertoir_estandes/pharmaCare/logo.png" width="30px"   alt="">
            </div>
          <span> </span>  
          </div>
        </a> 

        <a href="E-stand/nordisk.html"  class="link_stande4 link ">
          <div class="icon twitter">
            <div class="tooltip">
              Novo Nordisk
              <img src="E-stand/repertoir_estandes/Novo Nordisk/logo1.png" width="50px"   alt="">
            </div>
          <span> </span>  
          </div>
        </a>

        <a href="E-stand/Boehringer.html"  class="link_stande10 link">
        
          <div class="icon twitter">
            <div class="tooltip">
              Boehringer
              <img src="E-stand/repertoir_estandes/Boehringer/logo.png" width="50px"   alt="">
            </div>
          <span> </span>  
          </div>
        </a>

        <a href="E-stand/novartis.html"  class="link_stande11 link">
          <div class="icon twitter">
            <div class="tooltip">
              Novartis
              <img src="E-stand/repertoir_estandes/Novartis/logo.png" width="50px"   alt="">
            </div>
          <span> </span>  
          </div>
        
        </a> 


        <!-----------------------------------Quiter------------------------------>
        <!-- <a href="./PHP/destroy.php" data-bs-toggle="tooltip" data-bs-placement="top" title="Se déconnecter" class="quiter link">Se déconnecter</a>  -->


    



        
      
      

        

      </div>



  
 

            <div class="col-sm-12" style="margin-top:30px">
                    <div class="alert fade alert-simple alert-warning alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show" role="alert" data-brk-library="component__alert">
                      <button type="button" class="close font__size-18" data-dismiss="alert">
                              <span aria-hidden="true">
                                <i class="fa fa-times warning"></i>
                              </span>
                              <span class="sr-only">Close</span>
                            </button>
                      <i class="start-icon fa fa-exclamation-triangle faa-flash animated"></i>
                      <strong class="font__weight-semibold">NB!</strong> 
                      <p style="text-align: center;">Pour obtenir une bonne vue, vous devez faire pivoter votre appareil en mode paysage</p>
                    </div>
            </div>


            <script>
                  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                  return new bootstrap.Tooltip(tooltipTriggerEl)
                });

               

                
            </script>

    <script src="E-poster/js/glightbox.min.js"></script>
    <script src="E-poster/js/swiper-bundle.min.js"></script>
    <script src="E-stand/js/main1.js"></script>
    <script src="js/main.js?v:0.05"></script> 
</body>
</html>