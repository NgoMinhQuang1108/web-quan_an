<?php 
    session_start();
    include('../config/dbcon.php');
    include('myfunction.php');

    if(isset($_POST['register_btn']))
    {
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $phone = mysqli_real_escape_string($con, $_POST['phone']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

        //Check if email already registered
        $check_email_query = "SELECT email FROM users WHERE email='$email'";
        $check_email_query_run = mysqli_query($con, $check_email_query);

        if(mysqli_num_rows($check_email_query_run) > 0)
        {
            $_SESSION['message'] = "Email đã tồn tại!";
            header('Location: ../register.php');
        }
        else
        {
            if($password == $cpassword)
            {
                $insert_query = "INSERT INTO users (name, email, phone,  password) VALUE ('$name', '$email', '$phone', '$password')";
                $insert_query_run = mysqli_query($con, $insert_query);
    
                if($insert_query_run)
                {
                    $_SESSION['message'] = "Đăng ký thành công";
                    header('Location: ../login.php');
                }
                else
                {
                    $_SESSION['message'] = "Đã xảy ra sự cố";
                    header('Location: ../register.php');
                }
            }
            else
            {
                $_SESSION['message'] = "Mật khẩu không khớp";
                header('Location: ../register.php');
            }
        }
    }
    else if (isset($_POST['login_btn']))
    {
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);

        $login_query = "SELECT * FROM users WHERE email ='$email' AND password = '$password'";
        $login_query_run = mysqli_query($con, $login_query);

        if(mysqli_num_rows($login_query_run) > 0)
        {
            $_SESSION['auth'] = true;

            $userdata = mysqli_fetch_array($login_query_run );
            $userid = $userdata['id'];
            $username = $userdata['name'];
            $useremail= $userdata['email'];
            $role_as= $userdata['role_as'];

            $_SESSION['auth_user'] = [
                'user_id' => $userid,
                'name' => $username,
                'email' => $useremail
            ];

            $_SESSION['role_as'] = $role_as;

            if($role_as == 1)
            {
                redirect("../admin/index.php", "Chào mừng bạn đến trang ADMIN");
            }
            else
            {
                redirect("../index.php", "Đăng nhập thành công");
            }

        }
        else
        {
            redirect("../login.php", "Không hợp lệ");
        }
    }


?>