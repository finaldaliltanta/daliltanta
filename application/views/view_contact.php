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
			<div id="sign_form" style="height:auto;">
    
   
    
	<h1 id="contact_head">اتصل بنا</h1>
    <br />
    <br />
    <br />
    <hr/>
    <p id="contact_p"> للاستفسار و التوصل مع اداره الموقع يرجي ادخال البيانات التاليه </p>
  
    

<?php echo form_open('site/contact_validation');?>                    
  <table id="contact" width="500" border="0">
  <tr>
    <td width="394"> <?php echo form_input(array('id'=>'contact_name','name'=>'name' ));?></td>
    <td width="96"><span class="text-form">: الاسم</span> </td>
  </tr>
  <tr>
    <td><?php echo form_input(array('id'=>'email','name'=>'email' ));?></td>
    <td><span class="text-form">: الايميل</span></td>
  </tr>
  <tr>
    <td>  <?php echo form_textarea(array('id'=>'post_text','name'=>'message','rows'=>'5'
				  )); ?>
	</td>
    <td><span class="text-form_send">: الرساله</span> </td>
  </tr>
  <tr>
    <td>
    
    <?php echo form_submit(array('name'=>'submit','id'=>'contact_submit'),'ارسل');?></td>
    </td>
    <td>
    </td>
    
  </tr>
</table>
 
                            <?php echo form_close();?>
                             <div id="valid"> <?php echo '<q>'. validation_errors().'</q>';?></div>
                           
                             <?php if(isset($sent)){?>
                               <div id="sent">
                                <?php echo '<q>'.$sent.'</q>';?>
                                </div>
                             <?php }?>
                             
                             <?php if(isset($dont_sent)){?>
                               <div id="sent">
                                <?php echo '<q>'.$dont_sent.'</q>';?>
                                </div>
                             <?php }?>
                            
    </div>	
	  
      <img src="<?php echo base_url();?>images/contact_man.png" id="contact_man" />
      
	
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