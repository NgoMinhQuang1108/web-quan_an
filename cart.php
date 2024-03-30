<?php 
    include("functions/userfunction.php");
    include("includes/header.php"); 
?>

    <div class="py-3 bg-light shadow">
        <div class="container">
            <h6 class="">
                <a href="index.php">
                    Trang Chủ / 
                </a>
                <a href="cart.php">
                    Giỏ Hàng
                </a>
            </h6>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="">

                <div class="row">
                    <div class="col-md-12">         
                         <div class="row align-items-center ">
                         <div class="col-md-5">
                             <h6>Món Ăn</h6>
                         </div>
                         <div class="col-md-3">
                             <h6>Giá</h6>
                         </div>
                         <div class="col-md-2">
                             <h6>Số Lượng</h6>
                         </div>
                         <div class="col-md-2">
                             <h6>Xóa</h6>
                         </div>
                        </div>
                        
                     <?php $items = getCartItems();
                            foreach($items as $citem)
                            {
                                ?>
                                <div class="card product_data shadow-sm mb-3">
                                    <div class="row align-items-center ">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $citem['image'] ?>" alt="Hình" width="90">
                                        </div>
                                        <div class="col-md-3">
                                            <h5><?= $citem['name'] ?></h5>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Giá: <?= $citem['selling_price'] ?>đ</h5>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="input-group mb-3" style="width: 130px">
                                                <button class="input-group-text decrement-btn">-</button>
                                                <input type="text" class="form-control input-qty text-center bg-white" disabled value="<?= $citem['prod_qty'] ?>" disabled>
                                                <button class="input-group-text increment-btn">+</button>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-danger "><i class="fa fa-trash me-2"></i>Xóa</button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        ?>            
                    </div>
                </div>
            </div>
        </div>
    </div>
                
    
<?php include("includes/footer.php"); ?>
    