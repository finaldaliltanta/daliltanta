<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"><head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>دليل طنطا</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo base_url();?>css/slider_style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url();?>css/menu_style.css" type="text/css" media="screen" />
<!-- jquery ui custom build (for animation easing) -->
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/jquery.easing.js"></script>
<script language="javascript" type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>
<script type="text/javascript">
 $(document).ready( function(){	
		// buttons for next and previous item						 
		var buttons = { previous:$('#jslidernews1 .button-previous') ,
						next:$('#jslidernews1 .button-next') };			
		 $('#jslidernews1').lofJSidernews( { interval : 4000,
											direction		: 'opacitys',	
											easing			: 'easeInOutExpo',
											duration		: 1200,
											auto		 	: true,
											maxItemDisplay  : 4,
											navPosition     : 'horizontal', // horizontal
											navigatorHeight : 32,
											navigatorWidth  : 80,
											mainWidth		: 980,
											buttons			: buttons } );	
	});
</script>
    
     <script type="text/javascript" src="<?php echo base_url();?>js/custom.js" ></script>
    
<style type="text/css">
.block_logo{position:absolute;margin-left:10px;margin-top:10px;}



#gold_block table{margin-top:35px;}
#gold_block{float:right;padding:0px;width:700px; text-align:right;background:url(<?php echo base_url();?>images/gold_block.png) no-repeat;

border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;

margin-bottom:20px;
height:230px;

}
#gold_block table tr td{padding-right:10px;font-size:15px;text-align:right;color:#2e2e2e;text-transform:uppercase;font-weight:bold; }

#gold_block table tr{height:20px;}



#silver_block table{margin-top:15px;}
#silver_block{float:right;width:700px; text-align:right;background:url(<?php echo base_url();?>images/silver_block.png) no-repeat;

border-radius: 5px;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
-webkit-box-shadow: 0px 0px 14px rgba(32, 50, 50, 0.75);
-moz-box-shadow:    0px 0px 14px rgba(32, 50, 50, 0.75);
box-shadow:         0px 0px 14px rgba(32, 50, 50, 0.75);
margin-bottom:20px;
height:130px;
z-index:13px;


}
#silver_block table tr td{padding-right:10px;font-size:15px;text-align:right;color:#2e2e2e;text-transform:uppercase;font-weight:bold; }

#silver_block table tr{height:20px;}
.silver_block{position:absolute; width:200px;height:100px; margin-left:-180px; margin-top:20px}


#doc{float:right;padding:10px;width:680px; text-align:right;background:url(<?php echo base_url();?>images/advs_bg.png) no-repeat;-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
border:1px solid #ccc;
margin-bottom:20px;
height:95px;

}
#doc table tr td{padding:3px;font-size:15px;}
</style>
</head>
<body id="home" class="home blog cufon-enabled ie et_includes_sidebar">
		<?php include('header.php')?>	
	<div id="content" >
		<div class="container clearfix">	
        <p id="new"></p>


<!----------------------------------------------conetnt------------------------------------------------>


<div class="clear"></div>	
<div id="main-area">
	<div id="main-content" class="clearfix">
    
    <!---------------------------------------- left column the most view ------------------------------------------------------>
		<div id="left-column">
			<?php include('index1_content.php')?>	
	  
	
	<div class="clear"></div>			<div class='wp-pagenavi'>

</div>	
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
				<p id="copyright">
                <?php include('footer.php');?>
			</div> <!-- #footer-->
			
		</div> <!-- .container -->
	</div> <!-- #content -->
	

		
	 

    <script type="text/javascript" src="<?php echo base_url();?>js/superfish.js" ></script>
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
    
	
		jQuery('ul#secondary-menu').superfish({ 
			delay:       300,                            // one second delay on mouseout 
			animation:   {opacity:'show',height:'show'},  // fade-in and slide-down animation 
			speed:       'fast',                          // faster animation speed 
			autoArrows:  true,                           // disable generation of arrow mark-up 
			dropShadows: false                            // disable drop shadows 
		});
		
		et_search_bar();
	</script>
</body>

</html>			