<?php 
  include('../middleware/adminMiddleware.php') ;
  include('includes/header.php') ;
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php 
                    if(isset($_GET['id']))
                    {        
                        $id = $_GET['id'] ;
                        $category = getByID("categories", $id);
                        
                        if(mysqli_num_rows($category) > 0)
                        {
                            $data = mysqli_fetch_array($category);
                ?>
                        <div class="card">
                    <div class="card-header">
                        <h4>
                            Sửa thể loại 
                            <a href="category.php" class="btn btn-primary float-end">Quay Lại</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="hidden" name="category_id" value="<?= $data['id']?>">
                                    <label for="">Danh Mục</label>
                                    <input type="text" name="name" value="<?= $data['name'] ?>" placeholder="Nhập tên thể loại" class="form-control"> 
                                </div>
                                <div class="col-md-6">
                                    <label for="">Slug</label> 
                                    <input type="text" name="slug" value="<?= $data['slug'] ?>" placeholder="Nhập Slug" class="form-control"> 
                                </div>
                                <div class="col-md-12">
                                    <label for="">Mô Tả</label>
                                    <textarea rows="3" name="description" placeholder="Nhập mô tả" class="form-control"><?= $data['description'] ?></textarea>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="">Tải Hình Ảnh</label>
                                    <input type="file" name="image" class="form-control"> 
                                    <label for="">Hình ảnh hiện tại</label>
                                    <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                    <img src="../uploads/<?= $data['image'] ?>" class="mt-1" width="70px" height="70px" alt="">
                                </div>                              
                                <div class="col-md-12">
                                    <label for="">Tiêu Đề Meta</label> 
                                    <input type="text" name="meta_title" value="<?= $data['meta_title'] ?>" class="form-control" placeholder="Nhập tiêu đề Meta"> 
                                </div>
    
                                <div class="col-md-12">
                                    <label for="">Mô Tả Meta</label>
                                    <textarea rows="3" name="meta_description" placeholder="Nhập mô tả Meta" class="form-control"><?= $data['meta_description'] ?></textarea>
                                </div>
    
                                <div class="col-md-12">
                                    <label for="">Từ Khóa Meta</label>
                                    <textarea rows="3" name="meta_keywords" placeholder="Nhập từ khóa Meta" class="form-control"><?= $data['meta_keywords'] ?></textarea>
                                </div>
    
                                <div class="col-md-6">
                                    <label for="">Trạng Thái</label>
                                    <input type="checkbox" <?= $data['status'] ? "Kiểm Tra":"" ?> name="status"> 
                                </div>
    
                                <div class="col-md-6">
                                    <label for="">Phổ Biến</label>
                                    <input type="checkbox" <?= $data['popular'] ? "Kiểm Tra":"" ?> name="popular"> 
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_category_btn">Cập Nhật</button>
                                </div>
                            </div>                      
                        </form>
                    </div>
                        </div>
                <?php                                                  
                        }
                        else
                        {
                            echo "Danh mục không tìm thấy";
                        }
                    }
                    else
                    {
                        echo "Id missing form url";
                    }
                ?>
            </div>
        </div>
    </div>

<?php include('includes/footer.php') ?>