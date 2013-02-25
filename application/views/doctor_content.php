			
<div id="adv_content" style="">


    <?php foreach ($doctor as $value) {
        ?>

        <div id="doc">
            <ul class="ads" >
                <li class="doctors" style="float:right;margin-top:3px;margin-left:5px;" >
                    <img src="<?php echo base_url(); ?>images/vcard.png" class="icon"style="float:right;margin-top:3px;margin-left:5px;" >
                    <h3 style="float:right;color:#666"> <?php echo $value->name; ?>        </h3>

                    <div class="clear"></div>

                    <table width="600px" style="text-align:right; font-size:12px;">
                        <tbody>
                            <tr>
                             <td width="50%">

                                    التخصص :                                                               
                                    <font color="#057de7">
                                    <?php echo $value->spe; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16" height="16" 
                                         class="icon">
                                </td>
                                                               
                                 <td width="50%">

                                   
                                          التيليفون:                                                              
                                    <font color="#057de7" style="font-size:13px;">
                                    <?php echo $value->phone; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png" width="16" height="16" class="icon">
                                </td>
                               
                            </tr>
                        </tbody>
                    </table>

                    <table width="600px"style=" font-size:14px;">
                        <tbody>
                            <tr>
                            </tr>
                            <tr>
                               
 <td width="50%">

                                حجز بالتليفون  :                                                               
                                    <font color="#057de7">
                                    <?php echo $value->book; ?>                                                           </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16" 
                                         class="icon">    

                                </td>

                                <td width="50%">

                                    العنوان :                                                               
                                    <font color="#057de7">
                                    <?php echo $value->address; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16"
                                         height="16"
                                         class="icon">

                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table width="600px" style=" font-size:14px;">
                        <tbody>

                            <tr>

                            </tr>
                            <tr>
                            </tr>
                            <tr>

                               
                                <td width="50%">


                                    معادالتواجد  :                                                               
                                    <font color="#057de7">
                                    <?php echo $value->f_time; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"
                                         width="16" height="16" 
                                         class="icon">
                                </td>
                                 <td width="50%">


                                    ايام التواجد :                                                               
                                    <font color="#057de7">
                                    <?php echo $value->f_date; ?>                                                         </font>
                                    <img src="<?php echo base_url(); ?>images/bullet_red.png"

                                         width="16" height="16" 
                                         class="icon">
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <table width="500px" style=" font-size:14px;">

                        <tbody>
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                            </tr>
                            <tr>
                                
                            </tr>
                        </tbody>
                    </table>
                </li>
            </ul>

        </div>

        <!-- ---------------------------another doctor---------------------->


    <?php } ?>
</div>


	
