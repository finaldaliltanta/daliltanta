<div id="adv_content">
    <div class="boxLeft">

        <div id="adv_title">
           
             <?php foreach ($res as $s) { ?>
             <table width="100%" style="text-align:right" >
             <tr>
             <td width="20%"><img class="adv_logo" src="<?php echo base_url();?>images/adv_logo.png" /></td>
             <td width="70%">
             
             
         
             <table width="100%">
             <tr><td> <p class="adv_name"><?php echo $s->name; ?></p></td></tr>
             <tr><td> <p class="adv_view"> <span><?php echo $s->views; ?></span>: عدد الزوار</p></td></tr>
             </table>
            
             
             </td>
            
             <td width="10%"> <img class="gold_title" src="<?php echo base_url();?>images/adv_title_s.png" /></td>
             
             </tr>
             </table>
           
            
             <?php }?>
             
            
            </div>
            
            <div id="info_table">

            <img class="tabe_info" src="<?php echo base_url();?>images/adv_tabe_h.png" />
           
 <table width="700" id="table_content">
            <?php foreach ($res as $s) { ?>
            
            
            <tr>
            <td id="dif" width="50%">
            <table >
           <tr>
           <td><?php echo $s->nashat; ?></td>
           <td style="color:#9e0101" width="17%">: النشاط</td>
           <td width="5%"> <img class="dot" src="<?php echo base_url();?>images/dot.png" /></td>
           </tr>
           </table>
            </td>
            <td width="50%">
            
           <table id="">
           <tr>
           <td><?php echo $s->name; ?></td>
           <td style="color:#9e0101;padding-right:-6px;" width="15%">: الاسم</td>
           <td width="1%"> <img class="dot" src="<?php echo base_url();?>images/dot.png"  /></td>
           </tr>
           </table>
            
            
           </td>
            
            </td>
            </tr>
            
            
            <tr>
            <td width="50%">
            <table >
           <tr>
           <td><?php echo $s->address; ?></td>
           <td style="color:#9e0101 ;margin-right:-10px;" width="15%">: العنوان</td>
           <td width="5%"> <img class="dot" src="<?php echo base_url();?>images/dot.png" /></td>
           </tr>
           </table>
            </td>
            <td id="dif" width="50%">
            <table >
           <tr>
           <td><?php echo $s->phone; ?></td>
           <td style="color:#9e0101" width="17%">: التليفون</td>
           <td width="5%"> <img class="dot" src="<?php echo base_url();?>images/dot.png" /></td>
           </tr>
           </table></td>
            </tr>
             <?php }?>
            </table>
            
            </div>
            
             <div id="general_photo">
               <img class="photo_head" src="<?php echo base_url();?>images/adv_tabe_h2.png" />
               <div id="adv_images">
               <?php foreach ($photo as $value) { ?>
                                                    
                                                    <img class="adv_images" src="<?php echo $value['url'] ?>" width="690" />
                                                    <br>
                                                <?php } ?>
               
              
               </div>
            </div>
        
        
            <div id="comments">
   <img class="photo_head" src="<?php echo base_url();?>images/adv_tabe_h5.png" />
      <div id="comments_div">
      <div id="comment_info" style="margin-bottom:10px;">
       
 
     
 
      
      </div>
    
    
              <div id="comment_form" >
      <?php echo form_open('comments');?>                    
  <table id="contact2" width="500" border="0">
  <tr>
    <td width="394"> <?php echo form_input(array('id'=>'name','name'=>'name' ));?></td>
    <td width="96"><span class="text-form">: الاسم</span> </td>
  </tr>
<tr>
    <td width="394"> <?php echo form_input(array('id'=>'email','name'=>'email',"style"=>"text-align:left" ));?></td>
    <td width="96"><span class="text-form" >: الايميل</span> </td>
  </tr>
  <tr>
    <td>  <?php echo form_textarea(array('id'=>'comment','name'=>'message','rows'=>'5'
				  )); ?>
	</td>
    <td><span  style="padding-top:-140px;">: التعليق</span> </td>
  </tr>
  <tr>
    <td>
    
    <?php echo form_button(array('name'=>'submit','id'=>'contact_submit'),'علق');?></td>
    </td>
    <td>
    </td>
    
  </tr>
</table>
 
<?php echo form_close();?>
  <div id="comment_valid">
       
 
     
 
      
      </div>
 
 </div>
 
 
     
      </div>
      </div>
        
        
                        </div>


                        </div>

                        <div class="clear"></div>			<div class='wp-pagenavi'>
