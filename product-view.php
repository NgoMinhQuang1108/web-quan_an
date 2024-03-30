<?php 
    
    include("functions/userfunction.php"); 
    include("includes/header.php"); 

    if(isset($_GET['product']))
    {
        $product_slug = $_GET['product'];
        $product_data = getSlugActive("products",$product_slug);
        $product = mysqli_fetch_array($product_data);

        if($product)
        {
            ?>
            <div class="py-3 bg-light shadow">
                <div class="container">
                    <h6 class="">
                        <a class="text-dark text-decoration-none" href="">Trang Chủ / </a>
                        <a class="text-dark text-decoration-none" href="categories.php">Thực Đơn /</a>
             
                    <?= $product['name']; ?></h6>
                </div>
            </div>

            <div class="bg-light py-4 mt-4">
                <div class="container product_data mt-3">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="shadow">
                                <img src="uploads/<?= $product['image']; ?>" alt="Hình Ảnh Sản Phẩm" class="w-100 shadow">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h4 class=" fw-bold mt-4"><?= $product['name']; ?>
                                <span class="text-danger float-end"><?php if($product['trending']){ echo"Xu Hướng";} ?></span>
                            </h4>
                            <hr>
                            <p><?= $product['small_description']; ?></p>
                            <div class="row">
                            <div class="col-md-6">
                                    <h4>Giá Còn: <span class="text-success fw-bold"><?= $product['selling_price']; ?>đ</span> </h4>
                                </div>
                                <div class="col-md-6">
                                    <h5> Giá Gốc: <s  class="text-danger "> <?= $product['original_price']; ?>đ</s></h5>
                                </div>
                                <!-- <p>-------------</p> -->
                                
                            </div>

                            <div class="row">
                                <div class="col-md-4">                                  
                                    <div class="input-group mb-3" style="width: 130px">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" class="form-control input-qty text-center bg-white" disabled value="1" disabled>
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <button class="btn btn-primary px-4 addToCardBtn" value="<?= $product['id']; ?>"><i class="fa fa-shopping-cart me-2"></i>Thêm Giỏ Hàng</button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-danger px-4"><i class="fa fa-heart me-2"></i>Yêu Thích</button>
                                </div>
                            </div>

                            <hr>

                            <h5>Chi tiết món ăn:</h5>

                            <p><?= $product['description']; ?></p>
                        </div>
                    </div>
                </div>
            </div>


            <?php
        }
        else
        {
            echo "Không Tìm Thấy Sản Phẩm";
        }
    }
    else
    {
        echo "Đã xảy ra sự cố";
    }
    include("includes/footer.php"); 
    
?>