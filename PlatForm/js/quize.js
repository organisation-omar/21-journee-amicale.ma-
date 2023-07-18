
function calcNumbers(result)
{
    document.querySelector('.area').value = result;
    $('.removerep').fadeIn("slow");
}

document.querySelector(".removerep").addEventListener('click',()=>{
  $('.area').val("");
  $('.removerep').fadeOut();
})
/*****************Pour reponder sur la quizze**********************/




/*************Partie Quizze à coté orateur ************/

function getQuizzeReponse() {
    var ttc = new XMLHttpRequest();
        ttc.onreadystatechange=function()
        {
            if(this.status==200 && this.readyState==4)
            {
              var data=this.responseText;
            
              $(".skill-bars").html(data);

            }
        }
        ttc.open("POST",'./PHP/Quizze.php',true);
        ttc.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
        var QuestionNum=$("#qn").val();
        var data ="Questionnum="+QuestionNum+"&op=2";
        ttc.send(data);
}


document.querySelector("#btnquizze").addEventListener("click",()=>{
  if($('#tele').hasClass("iphone-x")){

    $('#tele').removeClass('iphone-x')
    $('#tele').addClass("iphone-x-top")
    $("#btnquizze").html('<i class="fas fa-times"></i>')

  }
  else{
    
    $('#tele').addClass('iphone-x')
    $('#tele').removeClass("iphone-x-top")

    $("#btnquizze").html("Quiz")
  }
  
})

document.querySelector('.btnvalidrep').addEventListener('click',()=>{

  var ttc = new XMLHttpRequest();
      ttc.onreadystatechange=function(){
      
          if(this.status==200 && this.readyState==4)
          {
                      var data=this.responseText;
                      if(data==1)
                      { 
                        $(".area").val("");
                        $(".area").attr("placeholder",'fait avec succès')
                      }
                      else if(data==-1){
                        $(".area").val("");
                        $(".area").attr("placeholder",'Déjà fait ')
                      }
          }
      }
      ttc.open("POST",'./PHP/Quizze.php',true);
      ttc.setRequestHeader("Content-Type","application/x-www-form-urlencoded"); 
          var rep=$('.area').val(),
              Qnumero=$('#qn').val(),
              user=getcompt()[0].user;
  
          if(rep!=""){
                    var data ="rep="+rep+"&user="+user+"&Questionnum="+Qnumero+"&op=1";
  
          }
          else
          $(".area").attr("placeholder",'choisissez la réponse')
      ttc.send(data);
})


document.querySelector('#myBtnreteur').addEventListener("click",()=>{
$('#contentvedio ').hide('slow', function(){ $('#contentvedio ').remove(); });
  $('.content').fadeOut("slow")

  setTimeout(()=>{
    document.getElementById('liveinvers').play()
  },1500)

  
})

document.querySelector("#liveinvers").addEventListener("ended",()=>{
          
 window.location.href='./index.php?er=-1';
})

window.addEventListener("beforeunload",()=>{
  $('.content').fadeOut("slow")
  setTimeout(()=>{
    document.getElementById('liveinvers').play()
  },1500)
})