<?php 
session_start();

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "Bạn không thể truy cập";
    header('Location: index.php');
    exit();
}

include("includes/header.php"); 

?>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php if(isset($_SESSION['message'])) { ?>
                    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                        <strong></strong> <?= $_SESSION['message'] ?>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    
                    <?php 
                    unset($_SESSION['message']);
                    }
                    ?>
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center">Đăng Nhập</h4>
                        </div>
                        <div class="card-body">
                        <form action="functions/authcode.php" method="POST">
                           
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Nhập email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Mật Khẩu</label>
                                <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" id="exampleInputPassword1">
                            </div>
                                           
                            <button type="submit" name="login_btn" class="btn btn-primary">Đăng Nhập</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
<?php include("includes/footer.php"); ?>