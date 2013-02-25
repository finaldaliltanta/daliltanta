// JavaScript Document
$(document).ready(function(){



setInterval(function(){get_chat_messages();},1000);
	
	
	
	
	$("#contact_submit").click(function(){
		
	var name=$("#name").val();
	var email=$("#email").val();
	var comment=$("#comment").val();
	
	  
	if(name=="" || email=="" || comment=="" || adv_id==""){
	    $("#comment_valid").html("يجب ادخال جميع البيانات المطلوبه");
		return false;
		}
		if(name.length>20){
			$("#comment_valid").html("يجب ان لا يزيد الاسم عن 20 حرف");
		return false;
			}
		
		if(email.length>100){
			$("#comment_valid").html("يجب ان لا يزيد الايميل عن 100 حرف");
		return false;
			}
			if(comment.length>500){
			$("#comment_valid").html("يجب ان لا التعليق الاسم عن 500 حرف");
		return false;
			}
			 atpos = email.indexOf("@");
   dotpos = email.lastIndexOf(".");
  
   if (atpos < 1 || ( dotpos - atpos < 2 )) 
   {
      $("#comment_valid").html("من فضلك ادخل ايميل صحيح");
       
       return false;
   }

			
			
	$.post(base_url+"comments/add_comment" ,{ adv_id : adv_id , name : name , email : email , comment : comment }, function(data){



			},"json");
			$("#name").val("");
		    $("#email").val("");
		    $("#comment").val("");
			$("#comment_valid").html("");
		return false;
			
		
		});
		
			
		////////////////////////////////////////
		
		function get_chat_messages(){
		
        
		$.post(base_url +"comments/get_comment_ajax",{adv_id : adv_id }, function(data){
			
				$("#comment_info").html(data);
				
			});
			
			
	
	
		}
		
		/////////////////////////////////////////////
		
		///////////////////////////////////////////////
		
		
		
		///////////////////////////////////////////
	
	
		
		
		
	
		});
	
		