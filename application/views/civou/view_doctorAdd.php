<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>اضافه اعلان دكتور </title>

    </head>

    <body>
        <?php include('view_menu.php') ?>
        <?php
        if (isset($error)) {
            echo $error;
        }
        
        if(isset($name)){
            echo "تم  ادخال  الدكتور  ";
            echo $name.'   ';
            echo "بنجاح    ";
            
        }
        ?>
        <br/>  <br/>  <br/>


        <?php
        echo form_open('civou/c_doctor/add');
        ?>
        القسم الفرعى  :   
        <select name="dept" >
            <?php foreach ($res as $row) { ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->name; ?></option>
            <?php } ?>
        </select>

        <?php
        echo "<br/><br/>";
        echo "الاسم   :   ";
        echo form_input('adv_name');
        echo "<br/><br/>";
        echo "الوصف  :   ";
        echo form_input('desc');
        echo "<br/><br/>";
        echo "التخصص   :  ";
        echo form_input('adv_spe');
        echo "<br/><br/>";
        echo "العنوان   :  ";
        echo form_input('adv_address');
        echo "<br/><br/>";
        echo "التليفون   :  ";
        echo form_input('adv_phone');
        echo "<br/><br/>";
        echo "  ايام التواجد   :    ";
        echo form_input('adv_f_date');
        echo "<br/><br/>";
        echo "   معاد التواجد :    ";
        echo form_input('adv_f_time');
        echo "<br/><br/>";
        echo "   حجز بالتليفون  :    ";
        ?>

        <select name="adv_f_book" >
            <option value="لا يوجد " > لا يوجد </option>
            <option value="يوجد "  >يوجد  </option>
            <select/>

            <?php
            echo "<br/><br/>";

            echo form_submit('upload', 'حفظ');
            echo "<br/><br/>";

            echo form_close();
            ?>

            <br/><br/>
            <br/><br/>

            <?php echo validation_errors(); ?>

    </body>  

</html>