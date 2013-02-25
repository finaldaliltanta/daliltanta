<div id="adv_content">

    <ul class="ads">

        <!--        golden adv  data  -->   
<?php if(isset($result_num)){?>
                            <?php echo '<p class="result"> ' .$result_num .'</p> ';?>
                            <?php }?>
                            
                            <?php if(isset($error)){?>
                                   <?php echo '<p class="error"> '.$error.'</p> ';?>
                            <?php }?>
                            
                            
       <?php if(isset($results)){ 
    foreach ($results as $result2 ) { ?>
    <?php if($type == 'g') {?>
       <div id="doc">
            <ul class="ads" >
           
             <a style="float:right;position:absolute;margin-left:39px;margin-top:64px;" href="<?php echo base_url(); ?>site/showGoldenAdvDetail/<?php echo $id; ?>"  class="more"><span>التفاصيل</span></a>
         
                <li class="doctors" style="float:right;margin-top:3px;margin-left:5px;" >
                 <img src="<?php echo base_url(); ?>images/vcard.png" class="icon"style="float:right;margin-top:3px;margin-left:5px;" >
                   
                    <h3 style="float:right;color:#666"> <?php echo $name; ?>        </h3>

                    <div class="clear"></div>

                    <table width="600px" style="text-align:right; font-size:14px;">
                        <tbody>
                            <tr>
                             <td width="50%">

                                    التيليفون:                                                              
                                    <font color="#057de7">
                                    <?php echo $phone; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png" width="16" height="16" class="icon">
                                </td>
                                                               
                                 <td width="50%">

                                    النشاط:                                                              
                                    <font color="#057de7">
                                    <?php echo $nashat; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16" height="16" 
                                         class="icon">
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>

                    <table width="600px"style=" font-size:14px;text-align:right;">
                        <tbody>
                            <tr>
                            </tr>
                            <tr>
                               
 
                                <td width="50%">

                                    العنوان :                                                               
                                    <font color="#057de7">
                                    <?php echo $address; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16"
                                         class="icon">
                                         

                                </td>
                                 
                                <td width="50%">

                              الاسم:                                                             
                                    <font color="#057de7">
                                    <?php echo $name; ?>                                                           </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16" 
                                         class="icon">    

                                </td>
                            </tr>
                        </tbody>
                    </table>
  </li>
  <?php if( isset($hamada)){?>
  <img style="float:left;position:absolute;margin-left:-35px;margin-top:-13px;" src="<?php echo base_url(); ?>images/rg.png"  />
  <?php }?>
            </ul>


        </div>

            <?php }elseif($type == 's'){?>
             <div id="doc">
            <ul class="ads" >
           
             <a style="float:right;position:absolute;margin-left:39px;margin-top:64px;" href="<?php echo base_url(); ?>site/showSliverAdvDetail/<?php echo $id; ?>"  class="more"><span>التفاصيل</span></a>
         
                <li class="doctors" style="float:right;margin-top:3px;margin-left:5px;" >
                 <img src="<?php echo base_url(); ?>images/vcard.png" class="icon"style="float:right;margin-top:3px;margin-left:5px;" >
                   
                    <h3 style="float:right;color:#666"> <?php echo $name; ?>        </h3>

                    <div class="clear"></div>

                    <table width="600px" style="text-align:right; font-size:14px;">
                        <tbody>
                            <tr>
                             <td width="50%">

                                    التيليفون:                                                              
                                    <font color="#057de7">
                                    <?php echo $phone; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png" width="16" height="16" class="icon">
                                </td>
                                                               
                                 <td width="50%">

                                    النشاط:                                                              
                                    <font color="#057de7">
                                    <?php echo $nashat; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16" height="16" 
                                         class="icon">
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>

                    <table width="600px" style=" font-size:14px;text-align:right;">
                        <tbody>
                            <tr>
                            </tr>
                            <tr>
                               
 
                                <td width="50%">

                                    العنوان :                                                               
                                    <font color="#057de7">
                                    <?php echo $address; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16"
                                         class="icon">
                                         

                                </td>
                                 
                                <td width="50%">

                              الاسم:                                                             
                                    <font color="#057de7">
                                    <?php echo $name; ?>                                                           </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16" 
                                         class="icon">    

                                </td>
                            </tr>
                        </tbody>
                    </table>
  </li>
  <?php if( isset($hamada)){?>
  <img style="float:left;position:absolute;margin-left:-35px;margin-top:-13px;" src="<?php echo base_url(); ?>images/rg.png"  />
  <?php }?>
            </ul>


        </div>
            
            <?php }elseif($type == 'n'){?>
             <div id="doc">
            <ul class="ads" >
           
          
                <li class="doctors" style="float:right;margin-top:3px;margin-left:5px;" >
                 <img src="<?php echo base_url(); ?>images/vcard.png" class="icon"style="float:right;margin-top:3px;margin-left:5px;" >
                   
                    <h3 style="float:right;color:#666"> <?php echo $name; ?>        </h3>

                    <div class="clear"></div>

                    <table width="600px" style="text-align:right; font-size:14px;">
                        <tbody>
                            <tr>
                             <td width="50%">

                                    التيليفون:                                                              
                                    <font color="#057de7">
                                    <?php echo $phone; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png" width="16" height="16" class="icon">
                                </td>
                                                               
                                 <td width="50%">

                                    النشاط:                                                              
                                    <font color="#057de7">
                                    <?php echo $nashat; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16" height="16" 
                                         class="icon">
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>

                    <table width="600px"style=" font-size:14px;text-align:right;">
                        <tbody>
                            <tr>
                            </tr>
                            <tr>
                               
 
                                <td width="50%">

                                    العنوان :                                                               
                                    <font color="#057de7">
                                    <?php echo $address; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16"
                                         class="icon">
                                         

                                </td>
                                 
                                <td width="50%">

                              الاسم:                                                             
                                    <font color="#057de7">
                                    <?php echo $name; ?>                                                           </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16" 
                                         class="icon">    

                                </td>
                            </tr>
                        </tbody>
                    </table>
  </li>
  <?php if( isset($hamada)){?>
  <img style="float:left;position:absolute;margin-left:-35px;margin-top:-13px;" src="<?php echo base_url(); ?>images/rg.png"  />
  <?php }?>
            </ul>


        </div>
            <?php }?>
	<?php }}?>
        


        <!--            sliver adv data -->




        <!--        normal adv -->


      

    </ul>

</div>