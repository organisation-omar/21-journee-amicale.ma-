
        function deletemessage(e,id){

            var xhr= new XMLHttpRequest();
            xhr.onreadystatechange=function(){
            
                if(this.status==200 && this.readyState==4){
                    var data=this.responseText;
                    if(data==1){
                    $(e.parentElement).hide('slow', function(){ $(e.parentElement).remove(); });
            
                    }
                }
            }
            xhr.open("POST","./PHP/sendmessage.php",true);
            xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            var data="&id="+id+"&op=2";
            xhr.send(data);
            }
    
    
    /**************chonger la color des button a chaque click la partie programme *************************/
    
    function chongecolor(e){
    if(e.className=="cl1"){
      for(i=0;i<document.getElementsByClassName("cl2").length;i++){
        document.getElementsByClassName("cl2")[i].className="cl1";
      }
      e.className="cl2";
    
    
    }
    
    }
    
 
    
    /******************************************************************************/
    
    
    
    function sendmessage(id,from,sale,msg,aa){
      var ttc = new XMLHttpRequest();
          ttc.onreadystatechange=function(){
            if(this.status==200 && this.readyState==4){
                    var data=this.responseText;
                    if(data==1){
                      if(document.getElementById("msgres")!=null)
                        document.getElementById("msgres").innerHTML="message est envoyé";
    
                        document.forms[0].reset();
                      }
                    }
            }
            ttc.open("POST",'./PHP/sendmessage.php',true);
            ttc.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
            var date=new Date(),
                time=date.getHours()+":"+date.getMinutes();
            var data ="aa="+aa+"&from="+from+"&msg="+msg+"&id="+id+"&sale="+sale+"&type=Null&time="+time+"&op=1";
            ttc.send(data);
    }
    
    
    
    function getnouvaeumsgv2(id,from,msg,aa){
      var date=new Date(),
            time=date.getHours()+":"+date.getMinutes();
      var messageHTML1='<div class="chat">'+
                              '<div class="profile">'+
                                 '<img class="img" src="./img/msg.png" >'+
                              '</div>'+
                          
                              '<div class="message">'+msg+'<br>'+
                              
                                 '<!--<strong> À :</strong> <span style="color: red;">'+aa+'</span>-->'+
                                 '<span class="timeres">'+time+'</span>'+
                              '</div>'+
                          
                              '<div class="user">'+from+'</div>'+
                            '<span class="remove" onclick="deletemessage(this,'+id+')"> <i class="fa fa-trash" ></i> </span>'+
                            '</div>';
              $('#contentjour').prepend(messageHTML1);
              myFunction(true);


                
    }


    function myFunction(p) {
      $("#myVideo").remove();
      var x = document.createElement("AUDIO");
      x.setAttribute("id", "myVideo");
      x.setAttribute("controls", "controls");
      x.style.display="none";
      
      var y = document.createElement("SOURCE");
      y.setAttribute("src", "");
      y.setAttribute("type", "./notificationSong/tonalité.mp3");
      x.appendChild(y);
      
      var z = document.createElement("SOURCE");
      z.setAttribute("src", "./notificationSong/tonalité.mp3");
      z.setAttribute("type", "audio/mpeg");
      x.appendChild(z);
    
      // Set the autoplay property:
      x.autoplay = p;
    
      document.body.appendChild(x);
    }
   
    
    
    
        function commencerlelive(sale){
          var ttc = new XMLHttpRequest();
          ttc.onreadystatechange=function(){
        
              if(this.status==200 && this.readyState==4){
                  var data=this.responseText;
                  if(data!=""){
                    document.getElementById("cmclive").href=""+data+"";
                    $('.logo').fadeIn("slow");  
                  
                               
                  }
        
                  else{
                      
                      document.getElementById("cmclive").href='../img/vd.mp4';
    
                  }
                  réniGlightbox();
              }
          }
          ttc.open("Post","PHP/livecomance.php",true);
          ttc.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
          var data="sale="+sale+"";
          ttc.send(data);
        
        }
        
        
        function réniGlightbox(){
          /*** Initiate glightbox ***/
          
          var glightbox = GLightbox({
            selector: '.glightbox'
           });
           $("#glightbox").remove();
           $("head").append('<script src="js/glightbox.min.js?v:0.02" id="glightbox"></script>');
           $("#contentvedio").html('<div class="preloader1"></div>');
        
          setTimeout(()=>{
             document.getElementById("cmclive").click();   
             $('.preloader1').hide('slow', function(){ $('.preloader1').remove(); });
             document.getElementById("cmclive").href="";   
    
    
          },3000) 
        }
    
        function logo(){
          $('.logo').fadeOut("slow");
          $(".plyr__volume button").click();
         }
        
         if(document.getElementById("myBtnreteur"))
        document.querySelector("#myBtnreteur").addEventListener('click',()=> { 
             
            fermerlongle();
           
        }); 
    
        if( document.querySelector(".bt"))
        document.querySelector(".bt").addEventListener("click",()=>{
          manupiler();
        })
            
    
      /***************************Manupilation des pages*********************************/
    
    function manupiler(){
      var xhr= new XMLHttpRequest(),
          l="./PHP/dateupdate.php",
          page=$("title").html();
                  
         
          if(page!="Live" && page!="Accueil"){
            l="../PHP/dateupdate.php";
          }
          
             

      xhr.open("POST",l,true);
      xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
      var compt=localStorage.getItem("compt");
      var tab=JSON.parse(compt);
      if(tab!=null){
        var NomUti=tab.user;
      var data="&NomUti="+NomUti+"&page="+page+"";
      xhr.send(data);
      }
      
           }

           window.addEventListener("load",()=>{
           
              manupiler();
           })
    
    function fermerlongle(){
              var xhr= new XMLHttpRequest(),
                  lien=window.location.href.split("/").pop(),
                  l="./PHP/fermer.php";
                 
              if(lien!="live.php" && lien!="Accueil.php")
                 lien="../PHP/fermer.php";
              
              xhr.open("POST","./PHP/fermer.php",true);
              xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
              var compt=localStorage.getItem("compt");
              var tab=JSON.parse(compt);
              var NomUti=tab.user;
              var data="&NomUti="+NomUti+"";
              xhr.send(data);
    }
      /************************************************************/
    
     
    
    
    
      function msgsender(msg){
        var date=new Date(),
            time=date.getHours()+":"+date.getMinutes();
        var elm='<div style="position: relative;width: -moz-fit-content;width: fit-content;margin-bottom: 15px;" >'+
                    '<div class="point"> &blacktriangleleft; </div>'+
                    '<div class="msgsender" dir="auto" class="msgsendercontent">'+msg+'<div class="timemsg">'+time+'</div></div>'+                               
                  '</div>';
        $(".boitmsg").append(elm);
       var a=document.getElementById("boitmsg");
        a.scrollTo({
          top: parseInt(a.clientHeight*6.26),
          left:0,
          behavior:"smooth"

      });
      }
      
      
      function userinfo(user,mail){
        var compt=localStorage.getItem("compt");  
        if(compt==null){
          var compt={
              email:mail,
              user:user
            };
            localStorage.setItem("compt",JSON.stringify(compt));
          
      
        } 
      

        
      }
  
    
    
      function getcompt(){
        var   compt=localStorage.getItem("compt"),
              tab=JSON.parse(compt),
              name=tab.user,
              id=tab.email,
              tab1=[{"email":id,"user":name}];
        return tab1;
      }

      

      function toggle(e){
        $(e).fadeOut();
     
        document.getElementById("vd").play();
      }

      if(document.querySelector('#vd'))
      document.querySelector("#vd").addEventListener("ended",()=>{
                
        $(".port").fadeToggle();
        // $('.contenthome img').addClass("zomIn");
        

      });

    

       if(document.querySelector('.link_live1'))
      document.querySelector('.link_live1').addEventListener("click",()=>{
        $('.contenthome img').fadeOut();

        document.getElementById("livevd").play();
      })

      if(document.querySelector("#livevd"))
      document.querySelector("#livevd").addEventListener("ended",()=>{
                
        window.location.href='./live.php';
        

      });



     