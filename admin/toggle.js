//This will greet you at a specific time of the day.
$( document ).ready(function() {
	let myDate = new Date();
	let hrs = myDate.getHours();
	let greet;
	if (hrs < 12){
		greet = 'Goedemorgen';
	}
	else if (hrs >= 12 && hrs <= 17){
		greet = 'Goedemiddag';
	}
    else if (hrs >= 17 && hrs <= 24){
	    greet = 'Goedenavond ';
	}
$("#Inloggen").html(""+ greet);
});

//This will turn the text of a type password into a type text to make the text vissible
$("#showitbtn").click(function(){
    		let input = $("#password");
    		if (input.attr("type") == "password") {
    			input.attr("type", "text");
    			$("#eyes").toggleClass("fas fa-eye fa-eye-slash");
    		} else {
    			input.attr("type", "password");
    			$("#eyes").toggleClass("fas fa-eye");
			}
});