<?php
$ereur=isset($_GET['er'])?$_GET['er']:'';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-poster</title>
    <link rel="stylesheet" href="css/eposter.css?n:0.01">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/glightbox.min.css">
    <link rel="stylesheet" href="css/button.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>




   
</head>
<body>

  <button id="myBtn"   data-bs-toggle="tooltip" data-bs-placement="top" title="Haut de la page" > <i class="fas fa-arrow-up"></i> </button>
  <a id="myBtnreteur"  data-bs-toggle="tooltip" data-bs-placement="top" title="retour" href="../index.php?er=-1"> <i class="fas fa-reply"></i>  </a>

      <header>
          <div class="header-container">
            <div class="header-top">
              <div class="container">
                <div class="row"> 
                  <div class="col-xs-7 col-sm-6">
          
                    <div class="welcome-msg hidden-xs l"> E-poster </div>
                    </div>
                  <div class="col-xs-5 col-sm-6"> 
                      <div class="top-search">
                          <div class="block-icon pull-right"> <a data-target=".bs-example-modal-lg" data-toggle="modal" class="search-focus dropdown-toggle links"> <span class="rch">Rechercher</span>  <i class="fa fa-search"></i>  </a>
                          <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                  
                                    <div class="modal-header">
                                      <button aria-label="Close" data-dismiss="modal" class="close" type="button"><img src="images/interstitial-close.png" alt="close"> </button>
                                    </div>

                                    <div class="modal-body">
                                      <form class="navbar-form">
                                          <div id="search">
                                          <div class="input-group">
                                              <input name="search" id="titre" placeholder="Search" class="form-control" type="text">
                                              <button type="button" class="btn-search button success"><i class="fa fa-search"></i></button>
                                            
                                            </div>
                                          
                                          </div>
                                      </form>
                                      <button style="margin:auto" id="getAll" class="button success">Aficher tout</button>
                                    </div>
                                    
                                    
                                </div>
                              </div>
                          </div>
                          </div>
                      </div>
                                
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
      </header>

   

      <div class="info" id="info">

     
      
      <?php 
        require '../../PHP/conexion.php';
        $Requet="SELECT * FROM iposter order by id desc ";
        $Result=mysqli_query($conexion,$Requet);
        $elm="";
        while($row=mysqli_fetch_array($Result)){
          $elm.='<div class="iposter ">
                  <a href="https://admin.21-journee-amicale.ma/PDF/'.$row[2].'" class="portfolio-lightbox lien" data-gallery="portfolioGallery'.$row[0].'"  > <i >'.$row[1].'</i></a>
                </div>';
        }

        echo $elm;
      
      ?>
      
      

     

          
      
  



      </div>
 <script>
     
       if("<?php echo $ereur; ?>"=="1"){
            document.getElementById("myBtnreteur").remove();
        }
 </script>
    


      <script type="text/javascript" src="js/jquery.min.js"></script> 
      <script type="text/javascript" src="js/bootstrap.min.js"></script> 
      <script src="js/swiper-bundle.min.js"></script>
      <script src="js/glightbox.min.js" id="glightbox"></script>
      <script src="js/main.js" id="main"></script>
      <script src="js/js.js"></script>
      
</body>
</html>