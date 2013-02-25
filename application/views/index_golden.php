<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US"><head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>دليل طنطا.كوم</title>
        <link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"  type="text/css" media="screen" />

        <link rel="stylesheet" href="<?php echo base_url(); ?>css/slider_style.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/menu_style.css" type="text/css" media="screen" />
        <!-- jquery ui custom build (for animation easing) -->
<script type="text/javascript">
var base_url=" <?php echo base_url();?>";
</script>
<script type="text/javascript">
var adv_id="<?php foreach ($res as $s) {  echo $s->id;} ?>";

</script>

   
   <script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
    <script src="<?php echo base_url();?>js/chat.js" type="text/javascript" ></script>
     <script type="text/javascript" src="<?php echo base_url();?>js/custom.js" ></script>
    <script src="<?php echo base_url();?>js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
    
        <!--script src="js/jquery.lint.js" type="text/javascript" charset="utf-8"></script-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />


<style type="text/css">
body{font-family:'myfont2';}
</style>
    </head>
    <body id="home" class="home blog cufon-enabled ie et_includes_sidebar">
        <?php include('header.php') ?>
        <div id="content" >
            <div class="container clearfix">	
                <p id="new"></p>


                <!----------------------------------------------conetnt------------------------------------------------>


                <div class="clear"></div>	
                <div id="main-area">
                    <div id="main-content" class="clearfix">

                        <!---------------------------------------- left column the most view ------------------------------------------------------>
                        <div id="left-column">

                            <?php include('golden_content.php') ?>
                            <div class="clear"></div>			<div class='wp-pagenavi'>

                            </div>	
                        </div> <!-- #left-column -->
                        <!----------------------------------- the right column site menu ----------------------------------------------------------->
                        <div id="sidebar">
                            <div id="eshopw_cart-4" class="widget eshop-widget eshopcart_widget">
                                <?php include('right_content.php') ?>

                                <!-- End css3menu.com BODY section -->
                            </div> <!-- end .widget -->		


                        </div> <!-- end #sidebar -->			
                    </div> <!-- #main-content -->
                </div> <!-- #main-area -->
                <div id="main-area-bottom"></div>

                <!---------------------------------------- footer ------------------------------------------------------>
                <div id="footer">
                    <p id="copyright">
                        <?php include('footer.php') ?>
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

        <script type="text/javascript" charset="utf-8">
            $(document).ready(function(){
                $("area[rel^='prettyPhoto']").prettyPhoto();
				
                $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',theme:'light_square',slideshow:1000000, autoplay_slideshow: true});
                $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
                $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
                    custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
                    changepicturecallback: function(){ initialize(); }
                });

                $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
                    custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
                    changepicturecallback: function(){ _bsap.exec(); }
                });
            });
        </script>	
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