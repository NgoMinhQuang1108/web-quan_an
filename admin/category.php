<?php 
  include('includes/header.php') ;
  include('../middleware/adminMiddleware.php') ;
?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh Mục</h4>
                    </div>
                    <div class="card-body">
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
                                                        <?= $item['status'] == '0' ? "Visible": "Hidden"; ?>
                                                    </td>                                                                                                    
                                                    <td>
                                                        <a href="edit-category.php?id=<?= $item['id']; ?>" class="btn btn-primary">Sửa</a>
                                                        <form action="code.php" method="POST">
                                                            <input type="hidden" name="category_id" value="<?= $item['id']; ?>">
                                                            <button type="submit" class="btn btn-danger" name="delete_category_btn">Xóa</button>
                                                        </form>
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