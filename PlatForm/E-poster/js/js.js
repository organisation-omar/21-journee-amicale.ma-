window.onscroll = function() {scrollFunction()};

function scrollFunction() {

  if( document.getElementById("myBtn")!=null){

  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
  
  }

}



// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  window.scrollTo({
      top:0,
      left:0,
      behavior:"smooth"

  });
}


// When the user clicks on the sherch button
function rechercher(){
  var xhr=new XMLHttpRequest();
      xhr.onreadystatechange=function(){
       
  if(this.readyState==4 || this.status==200){
      var data=this.responseText;
      setTimeout(function(){
           document.getElementById("info").innerHTML=data;
           réniGlightbox();

      },1500);

  }  
 }
xhr.open("POST","./PHP/iposter.php",true);
xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

var titre=document.getElementById("titre").value;
var data="titre="+titre+"&op=1";
xhr.send(data);


}




function réniGlightbox(){
  $("#glightbox").remove();
  $("#main").remove();
  $("body").append('<script class="test" src="js/glightbox.min.js" id="glightbox"></script>');
  $("body").append('<script src="js/main.js" id="main"></script>');

  var glightbox = GLightbox({
   selector: '.glightbox'
  });
}



function animateButton(e) {

  e.preventDefault;
  //reset animation
  e.target.classList.remove('animate');
  
  e.target.classList.add('animate');
  
  e.target.classList.add('animate');
  setTimeout(function(){
    e.target.classList.remove('animate');
  },6000);
};

function getAll(){
  var xhr=new XMLHttpRequest();
      xhr.onreadystatechange=function(){       
      if(this.readyState==4 || this.status==200){
          var data=this.responseText;
          setTimeout(function(){
            document.getElementById("info").innerHTML=data;
            réniGlightbox();
 
          },1500);
      }  
 }
xhr.open("POST","./PHP/iposter.php",true);
xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
var data="op=2";
xhr.send(data);
}


$(".btn-search").on("click",(event)=>{
  rechercher();
  animateButton(event);
})





document.querySelector("#myBtn").addEventListener("click",()=>{
  topFunction();
})


$("#getAll").on("click",(event)=>{
  getAll();
  animateButton(event);
})
