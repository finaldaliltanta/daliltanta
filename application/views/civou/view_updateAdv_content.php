<style type="text/css">
    #update_content table {}
    #update_content table tr td{padding:5px;text-align:right;}		
    #update_content input[type="text"]{float:right;color:#333;text-align:right;color:#000;
                                       padding:7px 9px 6px; 
                                       margin:0; 
                                       width:312px;
                                       border:1px solid #e5e5e5; 
                                       background:#fff;
                                       outline:none;}

    #update_submit{background: none; border: none;
                   text-align:right;
                   width:100px;
                   height:30px;
                   padding-right:4px;

                   text-align:center;

                   background:#666;
                   color:#fff;
                   cursor:pointer;
                   font-family: 'myfont2';
                   margin-top:-60px;
                   margin-left:595px;
    }	
</style>
<div id="update_content">
    <!--begin jquery  and  css code  to make  drop down bompobox   ------------------------------------->
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.3.2.js"></script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('#loader').hide();
            $('#show_heading').hide();
             
            $('#search_category_id').change(function(){
                $('#show_sub_categories').fadeOut();
                $('#loader').show();
                $('#show_heading').show();
                    
                $.post("<?php echo site_url('js/get_chid_categories.php') ?>", {
                    parent_id: $('#search_category_id').val()
                }, function(response){			
                    setTimeout("finishAjax('show_sub_categories', '"+escape(response)+"')", 400);
                });
                return false;
            });
        });

        function finishAjax(id, response){
            $('#loader').hide();
            $('#show_heading').show();
            $('#'+id).html(unescape(response));
            $('#'+id).fadeIn();
        } 

        function alert_id()
        {
            if($('#sub_category_id').val() == '')
                alert('Please select a sub category.');
            else
                alert($('#sub_category_id').val());
            return false;
        }

    </script>
    <style>
        .both h4{ font-family:Arial, Helvetica, sans-serif; margin:0px; font-size:14px;}
        #search_category_id{ padding:3px; width:200px;}
        #sub_category_id{ padding:3px; width:200px;}
        .both{ float:left; margin:0 15px 0 0; padding:0px;}
    </style>        
    <!--end of drop down compobox    -- ---------------------------------------------------------  -->


    <!--  Begining of upload form  ******************************************************-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.form.js"></script>
    <script type="text/javascript"> 
        $(document).ready(function() { 
            //elements
            var progressbox 		= $('#progressbox'); //progress bar wrapper
            var progressbar 		= $('#progressbar'); //progress bar element
            var statustxt 			= $('#statustxt'); //status text element
            var submitbutton 		= $("#SubmitButton"); //submit button
            var myform 				= $("#UploadForm"); //upload form
            var output 				= $("#output"); //ajax result output element
            var completed 			= '0%'; //initial progressbar value
            var FileInputsHolder 	= $('#AddFileInputBox'); //Element where additional file inputs are appended
            var MaxFileInputs		= 100; //Maximum number of file input boxs
            var m=1;
            // adding and removing file input box
            var i = $('#AddFileInputBox div').size() + 1;
            $('#AddMoreFileBox').live('click', function() {
                if(i < MaxFileInputs)
                {
                    $('<span><input type="file" id="fileInputBox" size="20" name="file'+m+'"  class="addedInput" value=""/><a href="#" class="small2" id="removeFileBox"><img src="<?php echo base_url(); ?>images/close_icon.gif" border="0" /></a></span>').appendTo(FileInputsHolder);
                    i++;
                    m++;
                }
                return false;
            });

            $('#removeFileBox').live('click', function() { 
                if( i > 1 ) {
                    $(this).parents('span').remove();i--;
                }
                return false;
            });
            // congiguration to  uploadform2  div 

            var progressbox 		= $('#progressbox'); //progress bar wrapper
            var progressbar 		= $('#progressbar'); //progress bar element
            var statustxt 			= $('#statustxt'); //status text element
            var submitbutton 		= $("#SubmitButton"); //submit button
            var myform 				= $("#UploadForm2"); //upload form
            var output 				= $("#output"); //ajax result output element
            var completed 			= '0%'; //initial progressbar value
            var FileInputsHolder2 	= $('#AddFileInputBox2'); //Element where additional file inputs are appended
            var MaxFileInputs2		= 100; //Maximum number of file input boxs
            var mm=1;
            // adding and removing file input box
            var i = $('#AddFileInputBox2 div').size() + 1;
            $('#AddMoreFileBox2').live('click', function() {
                if(i < MaxFileInputs2)
                {
                    $('<span><input type="file" id="fileInputBox" size="20" name="gallery'+mm+'"  class="addedInput" value=""/><a href="#" class="small2" id="removeFileBox"><img src="<?php echo base_url(); ?>images/close_icon.gif" border="0" /></a></span>').appendTo(FileInputsHolder2);
                    i++;
                    mm++;
                }
                return false;
            });

            $('#removeFileBox').live('click', function() { 
                if( i > 1 ) {
                    $(this).parents('span').remove();i--;
                }
                return false;
            });

            //////////////// end of  upload formdiv2 ////////////////////////////

            $("#ShowForm").click(function () {
                $("#uploaderform").slideToggle(); //Slide Toggle upload form on click
            });
	
            $(myform).ajaxForm({
                beforeSend: function() { //brfore sending form
                    submitbutton.attr('disabled', ''); // disable upload button
                    statustxt.empty();
                    progressbox.show(); //show progressbar
                    progressbar.width(completed); //initial value 0% of progressbar
                    statustxt.html(completed); //set status text
                    statustxt.css('color','#000'); //initial color of status text
		
                },
	
                uploadProgress: function(event, position, total, percentComplete) { //on progress
                    progressbar.width(percentComplete + '%') //update progressbar percent complete
                    statustxt.html(percentComplete + '%'); //update status text
                    if(percentComplete>50)
                    {
                        statustxt.css('color','#fff'); //change status text to white after 50%
                    }else{
                        statustxt.css('color','#000');
                    }
			
                },
                complete: function(response) { // on complete
                    output.html(response.responseText); //update element with received data
                    myform.resetForm();  // reset form
                    submitbutton.removeAttr('disabled'); //enable submit button
                    progressbox.hide(); // hide progressbar
                    $("#uploaderform").slideUp(); // hide form after upload
                }
            });

        }); 
    </script> 
    <link href="<?php echo base_url(); ?>css/style_uploadform.css" rel="stylesheet" type="text/css" />

    <!-- end of upload form code **************************************************** -->

</head>
<style type="text/css">
    .error{color:#F00;font-size:18px}

</style>
<body>

    <?php
//        if (isset($customer)) {
//            if (!$customer) {
//                include('view_menu.php');
//            }
//        }
    ?>

    <br/><br/>
    <?php
    if (isset($error)) {
        echo '<p class="error">' . $error . '</p>';
    }
    ?>
    <br/><br/>

    <div class="error"><?php echo validation_errors(); ?></div>
    <?php echo form_open_multipart('c_custmer/updateAdv'); ?>


    <?php foreach ($res as $value) { ?>

        <?php echo form_hidden('id', $value->id); ?>
        <?php echo form_hidden('type', $value->type); ?>


        <table width="700" border="0">
            <tr>
                <td width="615"><?php echo form_input('adv_name', $value->name); ?></td>
                <td width="75">: الاسم</td>
            </tr>
            <tr>
                <td><?php echo form_input('desc', $value->desc); ?></td>
                <td>: الوصف</td>
            </tr>
            <tr>
                <td><?php echo form_input('adv_nashat', $value->nashat); ?></td>
                <td>: النشاط</td>
            </tr>
            <tr>
                <td><?php echo form_input('adv_address', $value->address); ?></td>
                <td>: العنوان</td>
            </tr>
            <tr>
                <td><?php echo form_input('adv_phone', $value->phone); ?></td>
                <td>: التليفون</td>
            </tr>
            <?php if (isset($value->username)) { ?>
                <tr>


                    <td><?php echo form_input('username', $value->username); ?></td>
                    <td>: صاحب الاعلان</td>

                </tr>
            <?php } ?>
            <?php if (isset($value->username)) { ?>
                <tr>



                    <td><?php echo form_input('pass', $value->password); ?></td>
                    <td>: كلمه السر</td>

                </tr>
            <?php } ?>
            <?php if (isset($value->vedio)) { ?>
                <tr>

                    <td><?php echo form_input('vedio'); ?></td>
                    <td width="75">: الفيديو</td>

                </tr>
            <?php } ?>
        </table>

    <?php } ?>

    <?php if (isset($photo)) { ?>
        <div id="uploaderform">
            <!--            <form  name="UploadForm" id="UploadForm">-->
            <label>  صور خاصه بالاعلان 

            </label>
            <div id="AddFileInputBox">
                <table border="1" > 
                    <?php
                    foreach ($photo as $ph) {
                        $i = 0;
                                               
                        ?>
                        <tr>
                            <td>
                                <a href="<?php   echo site_url("civou/c_adv/deleteOnePhoto/$photo_name"); ?>"  >مسح </a>
                            </td>
                            <td>
                                <img src="<?php echo $ph['th_url_photo'] ?>" width="100" height="80"  />
                            </td>     
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </table>
            </div>
            <span class="small"><a href="#" id="AddMoreFileBox">اضافه المزيد من الصور</a></span>
            <div class="sep_s"></div>
            <div id="progressbox"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
            <!--            </form>-->
        </div>

    <?php } ?>


    <?php if (isset($gallery)) { ?>

        <div id="uploaderform2" style="padding-top:50px;">
            <!--            <form  name="UploadForm" id="UploadForm">-->
            <label style="text-align:center;padding:0;margin:0" >  صور خاصه بالبوم الصور للاعلان الذهبى  

            </label>
            <div id="AddFileInputBox2">
                <table border="1" >
                    <?php
                    foreach ($gallery as $value) {
                        $i = 0;
                        ?> 
                        <tr>
                            <td>
                                <a href=""  >مسح </a>
                            </td><td>
                                <img src="<?php echo $value['th_url'] ?>" width="100" height="80"   />                     
                            </td>  
                            <?php
                            $i++;
                        }
                        ?>
                </table>
            </div>
            <div class="sep_s"></div>
            <div id="progressbox"><div id="progressbar"></div ><div id="statustxt">0%</div ></div>
            <span class="small"><a href="#" id="AddMoreFileBox2">اضافه المزيد من الصور</a></span>
            <!--            </form>-->
        </div>
    <?php } ?>
    <br/><br/>

    <?php
    echo "<br/><br/>";
    echo "<br/><br/>";
    echo form_submit(array("name" => 'upload', 'id' => 'update_submit'), 'حفظ');

    echo "<br/><br/>";

    echo form_close();
    ?>
    <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript" ></script>
    <script src="<?php echo base_url(); ?>js/jquery.js" type="text/javascript" ></script>
    <script type="text/javascript">
            
        $(document).ready(function() {$('#uploaderform2').hide();
            $('#type').change( 
            function(){
                var list_value=$('#type').val();
                
                if(list_value=='1'){
                    $('#uploaderform2').show();
                    $('#uploaderform').show();
                    $('#vedio').show();
                    $('#user').show();
                    $('#pass').show();
                }
                
                else if(list_value=='2'){
                    $('#uploaderform2').hide();
                    $('#uploaderform').show();
                    $('#vedio').hide();
                    $('#user').show();
                    $('#pass').show();
                }
                
                else if(list_value=='3'){
                    $('#uploaderform2').hide();
                    $('#uploaderform').hide();
                    $('#vedio').hide();
                    $('#user').hide();
                    $('#pass').hide();
                }
            }
        );
    
    </script> 

</div>