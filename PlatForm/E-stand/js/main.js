

$(document).ready(function() {
	          var apiKey = '5tpmnXbPCslksPMX1FtNVR6eJlkrD6NMrM57Phl0'; 
              var channelId = 1;
              var websocket = new WebSocket(`wss://connect.websocket.in/v3/${channelId}?api_key=${apiKey}`);
			  websocket.onmessage = function(event) {
				var Data = JSON.parse(event.data);
				

									
				if(Data.action=="logintest"){
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
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 3000);
	
});


function getcompt(){
	var   compt=localStorage.getItem("compt"),
		  tab=JSON.parse(compt),
		  name=tab.user,
		  id=tab.email,
		  tab1=[{"email":id,"user":name}];
	return tab1;
}