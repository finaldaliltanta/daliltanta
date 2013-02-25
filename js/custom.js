	
//When Mouse rolls over li
	$(document).ready(function(){
	//Hide the tooglebox when page load
	$(".main_menu ul.nav2 .sub_links").hide();
	//slide up and down when hover over heading 2
	$(".main_menu ul.nav2 li").click(function(){
	// slide toggle effect set to slow you can set it to fast too.
	$(this).next(".main_menu ul.nav2 .sub_links").slideToggle("slow");
	return true;
	});
	});

	