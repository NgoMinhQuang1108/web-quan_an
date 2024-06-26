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
                            Danh Mục
                            <a href="add-category.php" class="btn btn-success float-end"><i class="fa-solid fa-plus p-1"></i>Thêm Danh Mục</a>
                        </h4>
                    </div>
                    <div class="card-body" id="category_table">
                        <table class="table table-bordered table-striped">
                            <thead>                            
                                <tr>
                                    <th>ID</th>
                                    <th>Tên</th>
                                    <th>Hình Ảnh</th>
                                    <th>Trạng Thái</th>
                                    <th>Hoạt Động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $category = getAll("categories");

                                    if(mysqli_num_rows($category) > 0)
                                    {
                                        foreach($category as $item)
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
                                                        <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Sửa</a>
                                                        <!-- <form action="code.php" method="POST">
                                                            <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                            <button type="submit" class="btn btn-danger" name="delete_category_btn">Xóa</button>
                                                        </form> -->
                                                        <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['id']; ?>">Xóa</button>  
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "Không Có Danh Mục";
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