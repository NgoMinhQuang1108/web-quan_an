<?php 
    include('../functions/myfunction.php');
    if(isset($_SESSION['auth']))
    {
        if($_SESSION['role_as'] != 1 )
        {
            redirect("../index.php", "Bạn không được phép truy cập");       
        } 
    }
    else
    {
        redirect("../login.php", "Đăng nhập để tiếp tục"); 
    }

?>