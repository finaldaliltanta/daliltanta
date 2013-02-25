<style type="text/css">
    #admin_menu{width:1024px;margin:auto;}
    #admin_menu ul li{display:inline;list-style:none; text-align:right;float:right ;padding-left:15px; ;}
    #admin_menu ul li a{color:#C60;}
    #admin_menu ul li a:hover{color:#C90}
    #admin_menu ul{
        padding-bottom:  100px;
    }
</style>

<div id="admin_menu">
    <ul >
        <li><a href="<?php echo site_url('civou/c_sitead'); ?>"  >الصفحه الرئيسيه</a></li>
        <li><a href="<?php echo site_url('civou/c_dept/load_dept_view'); ?>"  >الاقسام الرئيسيه</a></li>
        <li><a href="<?php echo site_url('civou/c_dept/loadSubDeptView'); ?>"  >الاقسام الفرعيه</a></li>
        <li><a href="<?php echo site_url('civou/add_panners'); ?>" >اضافه بنر رئيسي</a></li>
        <li> <a href="<?php echo site_url('civou/c_adv/load_adv_add'); ?>" > اداره الاعلانات </a></li>
        <li><a href="<?php echo site_url('civou/c_adv/load_adv_edit'); ?>" >   التعديل على الاعلانات </a></li>
        <li><a href="<?php echo site_url('civou/c_doctor/load_doctor'); ?>" >     اداره الاطباء  </a></li>
        <li> <a href="<?php echo site_url('civou/c_doctor/load_doctorDeptAdd'); ?>" >     اضافه قسم الاطباء  </a></li>
        <li> <a href="<?php echo site_url('civou/c_sitead/contact_level1'); ?>" >  الرسائل الوارده  </a> </li>
        <li><a href="<?php echo site_url('site/logout'); ?>" >تسجيل خروج</a> </li>

    </ul>
</div>