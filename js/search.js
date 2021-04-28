$("#search").keyup(function(){
	var invoer = $("#search").val();
	if(invoer.length == 0){
		$("#table-body").html("");
	}else{
            $.ajax({
            url: "js/searchtest.php",
            method: "POST",
            data: {'search': invoer}
            })
            .done(function(data) {
            	let uitvoer = data;
            	//$("table-body").html(uitvoer);
                document.getElementById('rowing').innerHTML = uitvoer;
            })
            .fail(function(){
                alert("AJAX Failed Report to developer");
            });
	}
});