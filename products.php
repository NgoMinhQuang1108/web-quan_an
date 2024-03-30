<?php 
    
    include("functions/userfunction.php"); 
    include("includes/header.php"); 

    if(isset($_GET['category']))
    {
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories",$category_slug);
    $category = mysqli_fetch_array($category_data);

    if($category)
    {
    $cid = $category['id'];
?>
<div class="py-3 bg-light shadow">
    <div class="container">
        <h6 class="">
            <a class="text-dark text-decoration-none" href="">Trang Chủ / </a>
            <a class="text-dark text-decoration-none" href="categories.php">Thực Đơn /</a>
             
            <?= $category['name']; ?></h6>
    </div>
</div>
    <div class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h2 class="text-center"><?= $category['name']; ?></h2>
                <hr>
                <div class="row">
                    <?php 
                        $products = getProdByCategory($cid);
                        if(mysqli_num_rows($products) > 0)
                        {
                            foreach($products as $item)
                            {
                                ?>
                                <div class="col-md-3 mb-2">
                                    <a href="product-view.php?product=<?= $item['slug'] ?>">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <img src="uploads/<?= $item['image'] ?>" alt="Hình Sản Phẩm" class="w-100">
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
                
    
<?php 

    }
    else
    {
        echo "Đã xảy ra sự cố";
    }

    }
    else
    {
        echo "Đã xảy ra sự cố";
    }
    include("includes/footer.php"); 
    
?>
    