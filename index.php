<?php 
$ereur=isset($_GET['er'])?$_GET['er']:'';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lien  D'inscription</title>
    <link rel="stylesheet" href="Style/bootstrap.min.css">
    <link rel="stylesheet" href="Style/style.css?n:2.09">
    <link rel="stylesheet" href="Style/style1.css?n:0.01">
    <link rel="stylesheet" href="Style/form-validation.css">
    <script src="js/form-validation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     
     
    <script>

          setTimeout( function(){
           $('#preloader').fadeToggle();
           $("html, body").animate({ scrollTop: $(document).height() }, 2500);
            if("<?php echo $ereur ?>"==2){
           
                Swal.fire(
                     "Confirmation d'inscription",
                     "<span style='font-weight: bold;font-size: 0.7em;'> Nous avons bien reçu votre demande d'inscription vous allez recevoir un email de confirmation dans votre boîte de messagerie  <br> <strong style='color:red'> NB : </strong> si vous n'avez rien reçu d'ici quelques minutes, consultez votre dossier de spam </span>",
                     'success'
                );
            }
            
         
            },2000);


           
        </script>

    
</head>
<body>
    <header >   
        <img style="box-shadow: -10px 0px 20px #b2b2b2;" src="img/hd.jpg" width="100%" alt="">
    </header>
    <div id="preloader"></div>
    
    <div  class="content ">
              <h1 align="center"> <img src="./img/b1.png" width="100px"></h1>
              <h2 align="center" style="color:#728ea6" >Inscrivez-vous ici</h2>

              <div class="insc" >

                  <form  method="POST" class="needs-validation" action="PHP/Rejester.php" novalidate>
                        <label for="nom" >Nom </label> 
                        <input type="text" class="form-control"  autocomplete="off" style=" width: 60%; float: right;" id="nom"  name="Nom" required>  
                              <div class="invalid-feedback" style="font-weight: bold; font-size: 0.8em;" >
                                Ce champ est requis !
                              </div>

                        <label for="pre"> Prénom </label> 
                        <input type="text"  class="form-control"  autocomplete="off" style=" width: 60%; float: right;"  id="pre" name="prenom" required>  
                            <div class="invalid-feedback" style="font-weight: bold; font-size: 0.8em;" >
                                Ce champ est requis !
                            </div>

                        <label for="secteur">Secteur de travail</label>
                        <select id="secteur" class="form-control" style=" width: 60%; float: right;"   name="secteur" required>
                          <option id="universite" name="universite" value="universite">Université</option>
                          <option id="liberal" name="liberal" value="liberal">Libéral</option>
                          <option id="Public" name="Public" value="Public">Public</option>
                        </select>
                        <div class="invalid-feedback" style="font-weight: bold; font-size: 0.8em;" >
                          Ce champ est requis !
                        </div>

                        <label for="membre">Membre Amical</label>
                        
                         <table  class="form-control"  style=" width: 60%; float: right;display: flex;justify-content: center;height: fit-content;" >
                          <tr>
                              <th>
                                   <span >Oui</span> 
                                   <input style="cursor: pointer; margin-right: 20px;"   type="radio" name="membre" value="Oui">
                              </th>

                              <th> 
                                <span >Non </span>
                                <input style="cursor: pointer;"      type="radio"  id="Non" name="membre" value="no" checked >
                              </th>
                 
                          </tr>
                        </table>
                        
                      
                        <div class="invalid-feedback" style="font-weight: bold; font-size: 0.8em;" >
                          Ce champ est requis !
                        </div>

                        <label for="ville"> Ville </label>
                        <input type="text" id="ville" placeholder="" class="form-control " autocomplete="off" style=" width: 60%; float: right;"   name="ville" required>
                        <div class="invalid-feedback" style="font-weight: bold; font-size: 0.8em;" >
                          Ce champ est requis !
                        </div>

                        <label for="em"> E-mail </label>
                        <input  placeholder="name@example.com" id="em" type="email" autocomplete="off" name="email" class="form-control" style=" width: 60%; float: right;"   required>  
                        <div class="invalid-feedback" style="font-weight: bold; font-size: 0.8em;" >
                          Ce champ est requis !
                        </div>

                        <label for="tel">téléphone </label>
                        <input  placeholder="+2126..." id="tel" type="text" autocomplete="off" name="tel" class="form-control" style=" width: 60%; float: right;"   required>  
                        <div class="invalid-feedback" style="font-weight: bold; font-size: 0.8em;" >
                          Ce champ est requis !
                        </div>



                        <h6 align="center" style="width: 100%;display: flex;justify-content: center;padding: 10px;" >

                         

                                            <button type="submit" style="outline: none;border:0;border-radius: 10px;" class="animated-button1">
                                              <span></span>
                                              <span></span>
                                              <span></span>
                                              <span></span>
                                              Valider
                                            </a>


                         
                          </h6>

                  </form>

                  <h5 align="center" style="color:red;font: normal 30px 'Cookie', cursive;"> 
                    <?php 
                        switch($ereur){
                          case -1: echo "<span>Ce compte a été supprimé en raison de mesures de sécurité, veuillez vous réinscrire</span><br> Merci pour votre compréhension";break;
                          case 1:  echo "Vous êtes déjà inscrit";break;
                          case 2:  echo "<span style='color:green'>  &checkmark; Vous êtes inscrit avec succès Vérifiez votre boîte mail s'il vous plaît <br><span style='color:red'> <i style='font-family: initial;'>NB</i>: Ce processus peut durée quelques secondes</span> </span>";break;
                          case 3:  echo "Ce compte est déjà actif ailleurs";break;
                        }
                    ?>
                  </h5>

              </div>
    </div> 
   
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</body>
</html>