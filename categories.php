<?php 
    
    include("functions/userfunction.php"); 
    include("includes/header.php"); 
?>
<div class="py-3 bg-light shadow">
    <div class="container">
        <h6 class="">Trang Chủ / Thực Đơn</h6>
    </div>
</div>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h1 class="text-center">Thực Đơn</h1>
                <hr>
                <div class="row">
                    <?php 
                        $categories = getAllActive("categories");
                        if(mysqli_num_rows($categories) > 0)
                        {
                            foreach($categories as $item)
                            {
                                ?>
                                <div class="col-md-3 mb-2">
                                    <a href="products.php?category=<?= $item['slug'] ?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image'] ?>" alt="Hình Danh Mục" class="w-100">
                                                <h4 class="text-center mt-2"><?= $item['name'] ?></h4>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                    
                                <?php
                            }
                        }
                        else
                        {
                            echo "Không có Danh Mục";
                        }
                    ?>
                </div>
                </div>
            </div>
        </div>
    </div>
                
    
<?php include("includes/footer.php"); ?>
    