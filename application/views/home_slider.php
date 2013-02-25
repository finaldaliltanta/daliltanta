<p id="new"></p>
<h3 id="deals-title" ><span style="text-indent: -9999px;">المضاف حديثا</span></h3>

<!------------------------------------------ recently add---------------------------------------------------->

<div id='carousel_container'>
    <div id='left_scroll'><img src='<?php echo base_url(); ?>images/left-arrow.png' /></div>
    <div id='carousel_inner'>
        <ul id='carousel_ul'>
            <div id="items">
                <div class="block">		

                    <?php if (isset($slider1_pics)) { ?>
                        <?php foreach ($slider1_pics as $pic) { ?>		
                            <li><div class="item">
                                    <div class="item-top"></div>
                                    <div class="item-content">
                                        <span class="tag"><span><?php echo $pic->views; ?></span></span>
                                        <img style="margin-left:-14px;cursor:auto; margin-top:-7px;" src="<?php echo base_url(); ?>public/original/thumbs/<?php echo $pic->main_photo; ?>"  alt='<?php echo $pic->name ?>' width='196' height='152' />											
                                    </div> <!-- .item-content -->

                                    <?php if ($pic->type == 'g') { ?>
                                        <a href="<?php echo base_url(); ?>site/showGoldenAdvDetail/<?php echo $pic->adv_id; ?>"  class="more"><span>التفاصيل</span></a>
                                    <?php } else { ?>
                                        <a href="<?php echo base_url(); ?>site/showSliverAdvDetail/<?php echo $pic->adv_id; ?>"  class="more"><span>التفاصيل</span></a>

                                    <?php } ?>
                                </div> <!-- .item -->
                            </li>
                        <?php } ?>
                    <?php } ?>



                </div>
            </div>
        </ul>
    </div>
    <div id='right_scroll'><img src='<?php echo base_url(); ?>images/right-arrow.png' /></div>
</div>
