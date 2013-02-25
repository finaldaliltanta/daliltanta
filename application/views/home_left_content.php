<?php if (isset($last_views)) { ?> 
    <?php foreach ($last_views as $last_view) { ?>
        <div class="product">
            <div class="product-content clearfix">
                <?php if ($last_view->type == 'g') { ?>
                
                
                    <a href="<?php echo base_url(); ?>site/showGoldenAdvDetail/<?php echo $last_view->adv_id; ?>"  class="image">
                    
                    
                        <span class="rounded" ><img src="<?php echo base_url(); ?>public/original/thumbs/<?php echo $last_view->main_photo; ?>" width="192" height="130" /></span>
                        <span class="tag" style="left: -9px;"><span><?php echo $last_view->views; ?></span></span>
                    </a>
                <?php } else { ?>
                
                
                    <a href="<?php echo base_url(); ?>site/showSliverAdvDetail/<?php echo $last_view->adv_id; ?>" 
                    
                     class="image">
                        <span class="rounded" ><img src="<?php echo base_url(); ?>public/original/thumbs/<?php echo $last_view->main_photo; ?>" width="192" height="130" /></span>
                        <span class="tag" style="left: -9px;"><span><?php echo $last_view->views; ?></span></span>
                    </a>

                <?php } ?>   
                <h5 style="font-family:myfont2;"><?php echo $last_view->name; ?></h5>
                <p style="height:55px; font-size:12px; font-family:myfont2">
                    <?php echo $last_view->desc; ?>
                </p>

                <?php if ($last_view->type == 'g') { ?>
                    <a href="<?php echo base_url(); ?>site/showGoldenAdvDetail/<?php echo $last_view->adv_id; ?>"  class="more"><span>التفاصيل</span></a>
                <?php } else { ?>
                    <a href="<?php echo base_url(); ?>site/showSliverAdvDetail/<?php echo $last_view->adv_id; ?>"  class="more"><span>التفاصيل</span></a>

                <?php } ?>
                <span class="band buygetone"></span>
            </div> <!-- .product-content -->
        </div> <!-- .product -->

    <?php } ?>  
<?php } ?>  


<div class="clear"></div>			<div class='wp-pagenavi'>

</div>	