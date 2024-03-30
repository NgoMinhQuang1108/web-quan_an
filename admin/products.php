<?php 
  include('../middleware/adminMiddleware.php') ;
  include('includes/header.php') ;
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Sản Phẩm
                            <a href="add-product.php" class="btn btn-success float-end"><i class="fa-solid fa-plus p-1"></i>Thêm Sản Phẩm</a>
                        </h4>
                        
                    </div>
                    
                    
                    <div class="card-body" id="products_table">
                        <table class="table table-bordered table-striped">
                            <thead>               
                            
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hình Ảnh</th>
                                    <th>Trạng Thái</th>
                                    <th>Sửa</th>
                                    <th>Xóa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $products = getAll("products");

                                    if(mysqli_num_rows($products) > 0)
                                    {
                                        foreach($products as $item)
                                        {
                                            ?>
                                                 <tr>
                                                    <td><?= $item['id']; ?></td>
                                                    <td><?= $item['name']; ?></td>
                                                    <td>
                                                        <img src="../uploads/<?= $item['image']; ?>" width="60px" height="60px" alt="<?= $item['name']; ?>">
                                                    </td>
                                                    <td>
                                                        <?= $item['status'] == '0' ? "Hiển thị": "Ẩn"; ?>
                                                    </td>                                                                                                    
                                                    <td>
                                                        <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Sửa</a>                                                     
                                                    </td>
                                                    <td>                                                       
                                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>">Xóa</button>                                                 
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "Không Có Sản Phẩm";
                                    }
                                ?>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> 
        </div>
    </div>

<?php include('includes/footer.php') ?>