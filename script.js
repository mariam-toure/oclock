// initialisation des variables
/* jshint expr: true */
var centi = 0;
var mili = 0;
var sec = 0;
var sec_;
var afficher;
var compteur;

// affichage du compteur à 0
document.getElementById('time').innerHTML = "0" + sec + ":" + "0" + mili;



function chrono() {
    setInterval(function (){
        mili++;
            if (mili > 9) {
                mili = 0;
            }
    }, 1);
    
    centi++;
    centi*10;//=======pour passer en dixièmes de sec
    //=== on remet à zéro quand on passe à 1seconde
    if (centi > 9) {
        centi = 0;
        sec++;
    }  

    if (sec < 10) {
        sec_ = "0" + sec;
    }
    else {
        sec_ = sec;
    }
        
    afficher = sec_ + ":" + centi + mili;
    document.getElementById("time").innerHTML = afficher;
    
    reglage = window.setTimeout("chrono();",100);
} 


function debut()  //== Activation et désactivation des boutons
    {
            document.parametre.lance.disabled = "disabled";
            document.parametre.pause.disabled = "";
            document.parametre.zero.disabled = "";
            document.parametre.intermediaire.disabled = "";
            document.parametre.rappel.disabled = "";
    }
function arret() 
    {	
            window.clearTimeout(reglage);
            document.parametre.lance.disabled = "";
            document.parametre.pause.disabled = "disabled";
            document.parametre.zero.disabled = "";
            document.parametre.intermediaire.disabled = "";
            document.parametre.rappel.disabled = "";
    }
    
function raz() //====pour remettre à zéro
    { 
            document.parametre.zero.disabled = "disabled";
            document.parametre.intermediaire.disabled = "disabled";
            document.parametre.rappel.disabled = "disabled";
            centi = 0;
            mili = 0;
            sec = 0;
            compteur = "aucun temps intermediaire enregistré";
            afficher = sec + "0:" + centi + mili;	
            document.getElementById("time").innerHTML = afficher;
            document.getElementById('presenter').style.visibility='hidden';
            document.getElementsByName('intermediaire')[0].style.backgroundColor = 'rgba(50,205,50, 0.25)';
    }
    
function inter() //==== Pour afficher le temps intermédiaire
{
    compteur = document.getElementById("time").innerHTML;
    document.getElementsByName('intermediaire')[0].style.backgroundColor = "orange";
}

 function rappeler() {
    document.getElementById('presenter').style.visibility='visible';
    document.getElementById('interm').innerHTML = compteur;
    document.getElementsByName('intermediaire')[0].style.backgroundColor = 'rgba(50,205,50, 0.25)';
}


<br></br>
var set=0;
	
	function setv()
	{
		salm();
		var hr2= document.getElementById('hour2').value;
		var min2= document.getElementById('min2').value;
		var sec2= document.getElementById('sec2').value;
		if(hr2<10)
			hr2='0'+hr2;
		if(min2<10)
			min2='0'+min2;
		if(sec2<10)
			sec2='0'+sec2;
		document.getElementById('d2').value=hr2+'*'+min2+'*'+sec2;
		set=1;
		document.getElementById('msg').innerHTML='Alarm ON';
		document.getElementById('db').style.visibility="visible";
		document.getElementById('alm').style.visibility="hidden";
	}
	function dis()
	{
		var dat= new Date();
		var hr=dat.getHours();
		var min=dat.getMinutes();
		var sec=dat.getSeconds();
		if(hr<10)
			hr='0'+hr;
		if(min<10)
			min='0'+min;
		if(sec<10)
			sec='0'+sec;
		document.getElementById('hour').value=hr;
		document.getElementById('min').value=min;
		document.getElementById('sec').value=sec;
		var dat2v=document.getElementById('d2').value;
		var dats =hr+'*'+min+'*'+sec;
		if(dat2v==dats && set)
			{
				
				document.getElementById('alm').play();
				document.getElementById('sb').style.visibility="visible";
				//alert("Wake Up Man!");
				set=0;
				document.getElementById('db').style.visibility="hidden";
				document.getElementById('msg').innerHTML='Alarm RINGING';
			}
		setTimeout("dis()",500);
	}
	/*function prtsel(x)
	{
		for(var i=0;i<x;i++)
		{
			if(i<10)
			{
				document.write("<option value="+i+">"+0+i+"</option>");
			}
			else 
			{
				document.write("<option value="+i+">"+i+"</option>");
			}
		}
	}*/
	function salm()
	{
		document.getElementById('alm').pause();
		document.getElementById('sb').style.visibility="hidden";
		document.getElementById('msg').innerHTML='Alarm OFF';
	}
	function dalm()
	{
		set=0;
		document.getElementById('db').style.visibility="hidden";
		document.getElementById('msg').innerHTML='Alarm is OFF';
	}

<br></br>

	$(function(){
	
		var timer = {
		
			hours : "",
			minutes : "",
			seconds : "",
			
			
			getNewTime : function(){
				
			  var date = new Date(); 
					
				this.hours	= date.getHours();
				this.minutes  = date.getMinutes();
				this.seconds  = date.getSeconds();
				 
					// Format hours, minutes and seconds
				if (hours < 10) {
					hours = "0" + hours;
				}
				if (minutes < 10) {
					minutes = "0" + minutes;
				}
				if (seconds < 10) {
					seconds = "0" + seconds;
				}
				 
				$(".digits span.hours").html(hours + ":");
				$(".digits span.minutes").html(minutes + ":");
				$(".digits span.seconds").html(seconds);
			
				// console.log(this.seconds);
			},
			
			
			
			setUserTime : function(){
		
				// create Hours
				for(var i=0; i<=24; i++){
					
					if (i < 10) {i = "0" + i; }
			
					$("select.hours").append("<option value='"+i+"'>"+i+"</option>");
					
				}
				
				// create minutes
				for(var i=0; i<=60; i++){
					
					if (i < 10) {i = "0" + i; }
					
					$("select.minutes").append("<option value='"+i+"'>"+i+"</option>");
					
				}
				
			   // create seconds
				for(var sec=0; sec<=60; sec++){
					
					if (sec < 10) {sec = "0" + sec; }
					
					$("select.seconds").append("<option value='"+sec+"'>"+sec+"</option>");
					
				}
			},
			
			getUserTime : function(){
				
				var userHours = $("select.hours").val(); 
				
				var userMinutes = $("select.minutes").val(); 
				
				var userSeconds = $("select.seconds").val(); 
			
				// set chosen value on option html
				(userHours != null) ? $("select.hours").find("option:disabled").html(userHours): "";
				
				(userMinutes != null) ? $("select.minutes").find("option:disabled").html(userMinutes): "";
				
				(userSeconds != null) ? $("select.seconds").find("option:disabled").html(userSeconds): "";
				
				if( this.hours == userHours &&  this.minutes == userMinutes && this.seconds == userSeconds){
			  
			// adding mp3 backgrouns sound to alarm	 
			  $(".container").find('audio').attr("src","http://docs.google.com/uc?export=open&id=1GB1fu62kjdaD9oWZFROHgk3B4XXRhT3_");
			  
					$("body").addClass("body");
					
					$(".digits").addClass("animated shake infinite ");
		
					
				}else{
					
				//	console.log("time is not in yet");
					
				}
				
			},
		
			
			reloadPage : function(){
				
				$(".submit").on("click", function(){
				
					$("body").removeClass("body");
					
					$(".digits").removeClass("animated shake infinite ");
							$(".container").find('audio').attr("src","");
				});
			},
			
			
			styleInput : function(){
				$( ":input" ).css({
					border:"1px solid #2C3E50",
					padding:"3px 8px",
					"border-radius": "5px",
				});
			}
		   
		}
			
		
		
		
		  timer.styleInput();   
		  timer.reloadPage();
			timer.setUserTime();
			
			// active real time output
			setInterval( timer.getNewTime, 1000 );
			
			setInterval( timer.getUserTime, 1000 );
			
		}); 







