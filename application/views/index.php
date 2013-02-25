<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>دليل طنطا</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo base_url();?>css/slider_style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/menu_style.css" type="text/css" media="screen" />
<!-- jquery ui custom build (for animation easing) -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url();?>js/custom.js" ></script>
     
     
    
    
<script type="text/javascript">

  $(document).ready(function() {
        //move he last list item before the first item. The purpose of this is if the user clicks to slide left he will be able to see the last item.
        $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
        
        
        //when user clicks the image for sliding right        
        $('#right_scroll img').click(function(){
        
            //get the width of the items ( i like making the jquery part dynamic, so if you change the width in the css you won't have o change it here too ) '
            var item_width = $('#carousel_ul li').outerWidth() + 10;
            
            //calculae the new left indent of the unordered list
            var left_indent = parseInt($('#carousel_ul').css('left')) - item_width;
            
            //make the sliding effect using jquery's anumate function '
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
                
                //get the first list item and put it after the last list item (that's how the infinite effects is made) '
                $('#carousel_ul li:last').after($('#carousel_ul li:first')); 
                
                //and get the left indent to the default -210px
                $('#carousel_ul').css({'left' : '-210px'});
            }); 
        });
        
        //when user clicks the image for sliding left
        $('#left_scroll img').click(function(){
            
            var item_width = $('#carousel_ul li').outerWidth() + 10;
            
            /* same as for sliding right except that it's current left indent + the item width (for the sliding right it's - item_width) */
            var left_indent = parseInt($('#carousel_ul').css('left')) + item_width;
            
            $('#carousel_ul:not(:animated)').animate({'left' : left_indent},500,function(){    
            
            /* when sliding to left we are moving the last item before the first list item */            
            $('#carousel_ul li:first').before($('#carousel_ul li:last')); 
            
            /* and again, when we make that change we are setting the left indent of our unordered list to the default -210px */
            $('#carousel_ul').css({'left' : '-210px'});
            });
            
            
        });
  });
</script>
	<style type="text/css">

#carousel_inner {
float:left; /* important for inline positioning */
width:890px; /* important (this width = width of list item(including margin) * items shown */ 
overflow: hidden;  /* important (hide the items outside the div) */
/* non-important styling bellow */
margin-top:10px;
margin-bottom:60px;
}

#carousel_ul {
position:relative;
left:-210px; /* important (this should be negative number of list items width(including margin) */
list-style-type: none; /* removing the default styling for unordered list items */
margin: 0px;
padding: 0px;
width:9999px; /* important */
/* non-important styling bellow */
padding-bottom:10px;
}

#carousel_ul li{
float: left; /* important for inline positioning of the list items */                                    
width:208px;  /* fixed width, important */
/* just styling bellow*/
padding:0px;
height:180px;

 
margin-left:px; 
margin-right:15px; 
}

#carousel_ul li img {
.margin-bottom:-4px; /* IE is making a 4px gap bellow an image inside of an anchor (<a href...>) so this is to fix that*/
/* styling */
cursor:pointer;
cursor: hand; 
border:0px; 
}
#left_scroll, #right_scroll{
float:left; 
height:130px; 
width:15px; 

}
#left_scroll{margin-right:20px;}
#right_scroll{margin-left:20px;}
#left_scroll img, #right_scroll img{
/*styling*/
cursor: pointer;

margin-top:70px;


}
</style>
</head>
<body id="home" class="home blog cufon-enabled ie et_includes_sidebar">
	<?php include('header.php')?>
	<div id="content" >
		<div class="container clearfix">	
        <!--------------------------------------resently added--------------------------------------->
       <?php include('home_slider.php');?>
        <!--------------------------------------end of resently added--------------------------------------->

<!----------------------------------------------conetnt------------------------------------------------>


<div class="clear"></div>	
<div id="main-area">
	<div id="main-content" class="clearfix">
    
    <!---------------------------------------- left column the most view ------------------------------------------------------>
		<div id="left-column">
				
	<?php include('home_left_content.php') ;?>
		</div> <!-- #left-column -->
<!----------------------------------- the right column site menu ----------------------------------------------------------->
		<div id="sidebar">
	<div id="eshopw_cart-4" class="widget eshop-widget eshopcart_widget">
   <?php include('right_content.php');?>
               
<!-- End css3menu.com BODY section -->
  </div> <!-- end .widget -->		
    
    
</div> <!-- end #sidebar -->			
				</div> <!-- #main-content -->
			</div> <!-- #main-area -->
			<div id="main-area-bottom"></div>
            
	<!---------------------------------------- footer ------------------------------------------------------>
			<div id="footer">
				<?php include('footer.php');?>
			</div> <!-- #footer-->
			
		</div> <!-- .container -->
	</div> <!-- #content -->
	
<script type="text/javascript">
	var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
        	var indexImage = $('#bigPic img')[index]
            if(currentImage){   
            	if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(0, function() {
					    myTimer = setTimeout("showNext()", 4000);
					    $(this).css({'display':'none','z-index':1})
					});
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
           
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
	    myTimer = setTimeout("showNext()",0);
		showNext(); //loads first image
       
	});
    
	
	</script>	
    
	    <script type="text/javascript" src="<?php echo base_url();?>js/superfish.js" ></script>	
    <script type="text/javascript">
	jQuery('ul#secondary-menu').superfish({ 
			delay:       300,                            // one second delay on mouseout 
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
			speed:       'fast',                          // faster animation speed 
			autoArrows:  true,                           // disable generation of arrow mark-up 
			dropShadows: false                            // disable drop shadows 
		});
		
		
        </script>
</body>

</html>			