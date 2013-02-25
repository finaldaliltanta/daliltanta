<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>اضافه اعلان </title>

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



    </head>
    <?php include('dbcon.php'); ?>
    <body>


       
        <?php include('view_menu.php') ?>
         <?php
        if (isset($name)) {
         echo "تم  مسح  الاعلان   ";
         echo  "(  ".$name."  )" ;
         echo  "بنجاح   ";
        }
        ?>
        <br><br>
        <?php echo form_open_multipart('civou/c_adv/editAdv'); ?>

        <!--        <form action="#" name="form" id="form" method="post" onsubmit="return alert_id();"
                      enctype="multipart/form-data"  >-->

        <div class="both">
            <h4>Select Category</h4>
            <select name="search_category"  id="search_category_id">
                <option value="" selected="selected"></option>
                <?php
                $query = "select * from dept";
                $results = mysql_query($query);
                while ($rows = mysql_fetch_assoc(@$results)) {
                    ?>
                    <option value="<?php echo $rows['id']; ?>"><?php echo $rows['name']; ?></option>
                <?php }
                ?>
            </select>		
        </div>

        <div class="both">
            <h4 id="show_heading">Select Sub Category</h4>
            <div id="show_sub_categories" align="center">
                <img src="<?php echo base_url(); ?>images/loader.gif" style="margin-top:8px; float:left" id="loader" alt="" />
            </div>
        </div>
        <br clear="all" /><br clear="all" />
        <!--        </form>-->

        <div>

            <select name="advtype"  id="type" >
                <option value="1" >ذهبى </option>
                <option value="2" >فضى </option>
                <option value="3" >عادى</option>
            </select>


        </div>
        <br/><br/>
        <?php
        echo form_submit('upload', 'التالى ');
        echo "<br/><br/>";
        echo form_close();
        ?>
    </body>
</html>