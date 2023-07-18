<?php
include 'conexion.php';
    mysqli_query($conexion,"set character_set_server='utf8'");
    mysqli_query($conexion,"set names 'utf8'");
function sendMsg($email,$name,$prenom){
        $subject ="Confirmation d'inscription";
        $email_message ='
                            <!DOCTYPE html>
                            <html translate="no"> 
                                <head>
                                        <style>
                                                #msg{
                                                    color:red;
                                                    font-weight:bold;
                                                    font-size: 1.5em;
                                                }
                                                
                                                .txt{
                                                    font-size: 1.5em;
                                                    font-weight: bold;
                                                    margin: auto;    
                                                    text-align: center;
                                                    padding: 15px;
                                                    border-top: 3px solid #a39396;
                                                    width:90%;
                                                    border-radius: 25px;
                            
                                                }
                                                
                                                .h3{
                                                            border-bottom: 3px solid #a39396;
                                                            font-size: 1.5em;
                                                            font-weight: bold;
                                                            margin: auto;    
                                                            text-align: center;
                                                            padding: 10px;
                                                            width: 90%;
                                                            color: rgb(71, 66, 66);
                                                            border-radius: 25px;
                            
                                                }
                            
                                                a{
                                                    text-decoration: none;
                                                    font-weight: bold;
                                                    color: white;
                            
                                                }
                                                
                                                .btn{
                                                    
                                                    font-weight: bold;
                                                    font-size: 18px;
                                                    border-radius: 5px;
                                                    outline: none;
                                                    padding: 10px 20px 10px 20px;
                                                    color: #f8f9fa !important;
                                                    background-color: #1a73e8;
                                                    box-shadow: 0 1px 2px 0 rgba(60, 64, 67, .30), 0 1px 3px 1px rgba(60, 64, 67, .15);
                                                    font-family: monospace;
                                                
                                                }
                            
                                            
                                                
                                            
                                                h2{
                                                    font-weight: bold;
                                                    color: #0a0b46;
                                                }
                                                
                                                h3{
                                                    font-weight: bold;
                                                    color: #228fd6;
                                                }
                                                
                                        </style>
                                </head>
                                <body>
                                    <header>
                                        <h1  align="center">Cher(e) Participant <span style="color: red;">'.$name.' '.$prenom.'</span> </h1>
                                    </header>
                                    <section>
                                        <div class="txt" ><strong>Nous avons accusé réception de votre demande d\'inscription. Nous vous remercions pour l\'intérêt que vous porter à notre campagne</strong></div></br>
                                        <div style="border-left: 3px solid #a39396; border-right: 3px solid #a39396; width: 95%; margin: auto; border-radius: 15px;">
                            
                                            
                                                <h2 align="center">En cas de problème, nous contacter au</h2>
                                                <h3 align="center">+212 628249630</h3>
                                                <h3 align="center" style="color: rgb(255, 102, 0);">Vous pouvez suivre l\'évènement en direct le 21-22 mai 2021 </h3>
                                                <h4 align="center" style="color:#2d587f" >
                                                    <a align="center" class="btn"  href="https://21-journee-amicale.ma/verifier.php?mail='.$email.'"  >
                                                        Rejoindre
                                                </a>
                                                </h4>
                            
                                        </div>
                                        <div class="h3" >Nous restons à votre disposition pour toute information complémentaire <br><br> <p style="color: rgb(255, 102, 0); font-size: 0.8em;"> Cordialement Le comité d\'organisation </p> </div>
                                        <h2 align="center" id="msg" > Ce message est généré automatiquement. Merci de ne pas y répondre !!</h2>
                                                    <br><br>
                                    </section>
                                </body>
                            </html>';
                              

        require_once "phpMailer/PHPMailerAutoload.php";
        date_default_timezone_set('GMT/UTC');
        $mail=new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->isSMTP();
        $mail->Host = 'sourcedart.org';
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';                           
        $mail->Port = 587; 
        $mail->isHTML(true);
        $mail->Username = 'inscription@sourcedart.org';
        $mail->Password = 'H)F^ZDwn~Vb_';
        $mail->setFrom("inscription@sourcedart.org","Amicale interégionale");
        $mail->Subject = $subject;
        $mail->Body = "$email_message";
        $mail->addAddress($email,$name);
        if($mail->send()){
           echo "<script>window.location.href='https://21-journee-amicale.ma/index.php?er=2';</script>";
        }  
        else echo $mail->ErrorInfo;
}


?>



