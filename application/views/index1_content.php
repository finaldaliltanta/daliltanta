<div id="adv_content">

    <ul class="ads">


        <!--        golden adv  data  -->   

        <?php foreach ($golden as $value) { ?>
            
   
            <!------------------------doctor try -------------------------------------------->
             <div id="gold_block">
            <ul class="ads" >
           
             <a style="float:right;position:absolute;margin-left:100px;margin-top:165px;display:block;
             
             "  href="<?php echo base_url(); ?>site/showGoldenAdvDetail/<?php echo $value->id; ?>"  ><img src="<?php echo base_url(); ?>images/gold_more1.png" /></a>
         
                <li class="doctors" style="float:right;margin-top:3px;margin-left:5px;" >
                
                   
                  

                    <div class="clear"></div>

                    <table width="450px" style="text-align:right; font-size:14px;" >
                        <tbody>
                            <tr>
                             <td width="45%">

                                                                                              
                                   
                                    <?php echo $value->phone; ?>                                                         
                                   
                                </td>
                                                               
                                 <td width="50%">

                                     <?php echo $value->name; ?>                  
                                    
                                  
                                    
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>

                    <table width="450px"style=" font-size:14px;text-align:right;">
                        <tbody>
                            <tr>
                            </tr>
                            <tr>
                               
 
                                <td width="45%" height="20" >

                                   
                                   
                                    <?php echo $value->address; ?>                                                         
                                         

                                </td>
                                 
                                <td width="50%" height="20">


                                                                                     
                                   
                                        
                          <?php echo $value->nashat; ?>  

                                                                                         
                                      

                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
  </li>
  
            </ul>
<img src="<?php echo base_url();?>images/block_logo.png" class="block_logo" width="190" height="150" />
        </div>

        <!-- ---------------------------another doctor---------------------->


            <!------------------------------------------------------------------------------->
        <?php } ?>


        <!--            sliver adv data -->

        <?php foreach ($sliver as $value) { ?>
          
            
            
            <div id="silver_block">
            <ul class="ads" >
           <a style="float:right;position:absolute;margin-left:20px;margin-top:40px;display:block"  href="<?php echo base_url(); ?>site/showGoldenAdvDetail/<?php echo $value->id; ?>" ><img src="<?php echo base_url(); ?>images/silver_more.png" /></a>
         
                <li class="doctors" style="float:right;margin-top:3px;margin-left:5px;" >
                   
                   

                    <div class="clear"></div>

                    <table width="600px" style="text-align:right; font-size:14px;">
                        <tbody>
                            <tr>
                             <td width="57%">

                                                                                              
                                   
                                    <?php echo $value->phone; ?>                                                         
                                   
                                </td>
                                                               
                                 <td width="50%">

                                     <?php echo $value->name; ?>                  
                                    
                                  
                                    
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>

                    <table width="600px"style=" font-size:14px;text-align:right;">
                        <tbody>
                            <tr>
                            </tr>
                            <tr>
                               
 
                                <td width="57%" height="20" >

                                   
                                   
                                    <?php echo $value->address; ?>                                                         
                                         

                                </td>
                                 
                                <td width="50%" height="20">


                                                                                     
                                   
                                        
                          <?php echo $value->nashat; ?>  

                                                                                         
                                      

                                </td>
                            </tr>
                        </tbody>
                    </table>
            </ul>

        </div>              
        <?php } ?>



        <!--        normal adv -->


        <?php foreach ($normal as $value) { ?>
             
            <div id="doc">
            <ul class="ads" >
          
                <li class="doctors" style="float:right;margin-top:3px;margin-left:5px;" >
                    <img src="<?php echo base_url(); ?>images/vcard.png" class="icon"style="float:right;margin-top:3px;margin-left:5px;" >
                    <h3 style="float:right;color:#666"> <?php echo $value->name; ?>        </h3>

                    <div class="clear"></div>

                    <table width="600px" style="text-align:right; font-size:14px;">
                        <tbody>
                            <tr>
                             <td width="50%">

                                    التيليفون:                                                              
                                    <font color="#057de7">
                                    <?php echo $value->phone; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png" width="16" height="16" class="icon">
                                </td>
                                                               
                                 <td width="50%">

                                    النشاط:                                                              
                                    <font color="#057de7">
                                    <?php echo $value->nashat; ?>                                                         </font>
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
                                    <?php echo $value->address; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16"
                                         class="icon">
                                         

                                </td>
                                 
                                <td width="50%">

<table>
<tr>الاسم :<td></td><font color="#057de7">
                                    <?php echo $value->name; ?>                                                           </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16" 
                                         class="icon">  </tr>
</table>

                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
  </li>
            </ul>

        </div>               
        <?php } ?>


    </ul>

</div>