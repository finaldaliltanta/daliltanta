<div id="header">
    <div class="container clearfix">
        <a href="<?php echo base_url(); ?>site/"><img src="<?php echo base_url(); ?>images/logo.png"  id="logo"/></a>



        <div id="search-bar">
            <?php echo form_open_multipart('search/'); ?>
            <input type="image" src="<?php echo base_url(); ?>images/search-icon.png"  />

            <?php
            echo form_input(array('id' => 'searchinput', 'name' => 'keywords', 'value' => 'بتدور علي ايه ؟؟',
                'onblur' => "if(this.value=='') this.value='بتدور علي ايه ؟؟'", 'onfocus' => "if(this.value =='بتدور علي ايه ؟؟' ) this.value=''"
            ));
            ?>


            <?php echo form_close(); ?>
        </div> <!-- #search-bar -->
        <div id="clock"> <img src="<?php echo base_url(); ?>images/header_clock.png"  width="295" height="95" /></div>


        <div id="menu">
            <ul id="secondary-menu" class="nav superfish clearfix">


                <li  class="current_page_item"><a href="<?php echo base_url(); ?>site/"><strong>الرئيسيه</strong></a></li>	
                <li class="page_item page-item-"><a href="#"><strong>الاطباء</strong></a>
                    <ul class="sub-menu">

                        <?php
                        foreach ($result as $r) {
                            if ($r->d_id == 1) {
                                ?>
                                <li id="menu-item-86" class="menu-item menu-item-type-taxonomy menu-item-object-category"><a href="<?php echo site_url("site/showDoctor/$r->sd_id") ?>" tppabs=""> <?php echo $r->sd_name; ?><span></span></a></li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li class="page_item page-item-"><a href="<?php echo base_url(); ?>site/load_trains/"><strong>مواعيد القطارات</strong></a></li>
                <li class="page_item page-item-275"><a href="<?php echo site_url('site/load_cars') ?>"><strong>السيارات  </strong></a></li>
                <li class="page_item page-item-275"><a href="<?php echo site_url('site/load_jops') ?>"><strong>الوظائف  </strong></a></li>
                <li class="page_item page-item-275"><a href="<?php echo site_url('site/load_houses') ?>"><strong> العقارات</strong></a></li>

                <li class="page_item page-item-275"><a href="<?php echo site_url('site/contact_us') ?>"><strong>اتصل بنا</strong></a></li>
                <li class="page_item page-item-"><a href="<?php echo site_url('site/load_whoAre') ?>"><strong>عن الموقع</strong></a></li>


            </ul> <!-- ul#nav -->
        </div> <!-- #menu -->

    </div> <!-- .container -->
</div> <!-- #header -->

<!------------------------------------------ slider ---------------------------------------------------->

<div id="featured">
    <div id="slides">
        <div class="slideactive" >

            <div class="container">
                <div id="main_s" style="width:940px;margin-left:0px;"><!------------main slider----------------->


                    	<div id="container">
           
<!------------------------------------- THE CONTENT ------------------------------------------------->
<div id="jslidernews1" class="lof-slidecontent" style="width:935px; height:420px;">
	<div class="preload"><div></div></div>
    		 <!-- MAIN CONTENT --> 
              <div class="main-slider-content" style="width:935px; height:420px;">
                <ul class="sliders-wrap-inner">
                <?php if (isset($big_pics)) { ?>
                     
                                    <?php foreach ($big_pics as $pic) { ?>
                                     
                    <li>
                  <a href="<?php echo $pic->link; ?> ">
                            <img src="<?php echo base_url(); ?>public/uploads/slider/<?php echo $pic->pic_name; ?>"  width="935" height="420" /> 
                                      </a>
                        
                    </li> 
                   
                          
                    <?php } ?>
                                <?php } ?>
                  </ul>  	
            </div>
 		   <!-- END MAIN CONTENT --> 
           <!-- NAVIGATOR -->
           	<div class="navigator-content">
                  <div class="button-next">Next</div>
                  <div class="navigator-wrapper">
                        <ul class="navigator-wrap-inner">
                          <?php if (isset($big_pics)) { ?>
                          <?php foreach ($big_pics as $pic) { ?>
                           <li><img src="<?php echo base_url(); ?>public/uploads/slider/thumbs/<?php echo $pic->pic_name; ?>" width="70" height="25" /></li>
                          	
                           
                    <?php } ?>
                                <?php } ?>
                        </ul>
                  </div>
                  <div  class="button-previous">Previous</div>
             </div> 
          <!----------------- END OF NAVIGATOR --------------------->
          <!-- BUTTON PLAY-STOP -->
          <div class="button-control"><span></span></div>
           <!-- END OF BUTTON PLAY-STOP -->
          
 </div> 
 </div>


                </div><!------------ end of main slider----------------->
            </div> <!-- .container -->			

        </div> <!-- .slide -->
    </div> <!-- #slides-->



    <div id="top-shadow"></div>
    <div id="bottom-shadow"></div>


</div> <!-- end #featured -->	

