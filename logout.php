<?php 
    session_start();

    if(isset($_SESSION['auth']))
    {
        unset($_SESSION['auth']);
        unset($_SESSION['auth_user']);
        $_SESSION['message'] = "Đăng Xuất Thành Công";
    }

    header('Location: index.php');
?>