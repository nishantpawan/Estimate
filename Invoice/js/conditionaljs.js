	$(document).ready(function(){
		$("#parent1").css("display","none");
        $("#parent2").css("display","none");

    	$(".pttype").click(function(){
    	if ($('#ptype').val() == "Wallpaper" ) {
        	$("#parent1").slideDown("fast"); //Slide Down Effect   
        } 
        else {
            $("#parent1").slideUp("fast");	//Slide Up Effect
        } 
    }); 

       $(".pttype").click(function(){
        if ($('#ptype').val() == "Curtains" ) {
        	$("#parent2").slideDown("fast"); //Slide Down Effect   
        } 
        else {
            $("#parent2").slideUp("fast");	//Slide Up Effect
        } });
                
});
