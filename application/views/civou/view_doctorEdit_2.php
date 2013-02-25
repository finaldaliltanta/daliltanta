<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <title>تعديل  اعلان دكتور </title>

    </head>

    <body>
        <?php include('view_menu.php') ?>
        <?php
        if (isset($error)) {
            echo $error;
        }
        ?>
        <br/>  <br/>  <br/>


        <?php
        echo form_open('civou/c_doctor/update');
        ?>


        <?php
        foreach ($doctor as $value) {

            echo form_hidden('adv_id', $value->id);
            echo "<br/><br/>";
            echo "الاسم   :   ";
            echo form_input('adv_name', $value->name);
            echo "<br/><br/>";
            echo "الوصف  :   ";
            echo form_input('desc', $value->desc);
            echo "<br/><br/>";
            echo "التخصص   :  ";
            echo form_input('adv_spe', $value->spe);
            echo "<br/><br/>";
            echo "العنوان   :  ";
            echo form_input('adv_address', $value->address);
            echo "<br/><br/>";
            echo "التليفون   :  ";
            echo form_input('adv_phone', $value->phone);
            echo "<br/><br/>";
            echo "  ايام التواجد   :    ";
            echo form_input('adv_f_date', $value->f_date);
            echo "<br/><br/>";
            echo "   معاد التواجد :    ";
            echo form_input('adv_f_time', $value->f_time);
            echo "<br/><br/>";
            echo "   حجز بالتليفون  :    ";
            ?>

            <select name="adv_f_book" >
                <option value="لا يوجد " > لا يوجد </option>
                <option value="يوجد "  >يوجد  </option>
                <select/>

                <?php
            }
            echo "<br/><br/>";
            echo form_submit('upload', 'تعديل ');
            echo "<br/><br/>";

            echo form_close();
            ?>

            <br/><br/>
            <br/><br/>

            <?php echo validation_errors(); ?>

    </body>  

</html>