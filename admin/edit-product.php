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
                        
                    $id = $_GET['id']; 
                    $product = getByID("products", $id);

                    if(mysqli_num_rows($product) > 0 )
                    {
                        $data = mysqli_fetch_array($product);

                        ?>
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Sửa Sản Phẩm
                            <a href="products.php" class="btn btn-primary float-end">Quay Lại </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <label class="mb-0">Các Danh Mục</label>
                                    <select name="category_id" class="form-select mb-2">
                                    <option selected>Chọn Danh Mục</option>
                                        <?php
                                            $categories = getAll("categories");

                                            if(mysqli_num_rows($categories) > 0)
                                            {
                                                foreach ($categories as $item) {
                                                    ?>
                                                         <option value="<?= $item['id']; ?>" <?= $data['category_id'] == $item['id']?'selected':'' ?> ><?= $item['name']; ?></option>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "Chưa có Danh Mục";
                                            }
                                        ?>  
                                    </select>                    
                                </div>
                                <input type="hidden" name="product_id" value="<?= $data['id']; ?>">
                                <div class="col-md-6">
                                    <label class="mb-0">Tên Sản Phẩm</label>
                                    <input type="text" name="name" required value="<?= $data['name']; ?>" placeholder="Nhập tên Sản Phẩm" class="form-control mb-3"> 
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Slug</label> 
                                    <input type="text" name="slug" required value="<?= $data['slug']; ?>" placeholder="Nhập Slug" class="form-control mb-3"> 
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Mô Tả Nhỏ</label>
                                    <textarea rows="3" name="small_description" required placeholder="Nhập mô tả nhỏ" class="form-control mb-3"><?= $data['small_description']; ?></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Mô Tả</label>
                                    <textarea rows="3" name="description" required placeholder="Nhập mô tả" class="form-control mb-3"><?= $data['description']; ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Giá Gốc</label>
                                    <input type="text" name="original_price" required value="<?= $data['original_price']; ?>" placeholder="Nhập giá gốc" class="form-control mb-3"> 
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Giá Bán</label> 
                                    <input type="text" name="selling_price" required value="<?= $data['selling_price']; ?>" placeholder="Nhập giá bán" class="form-control mb-3"> 
                                </div>
                                
                                <div class="col-md-12">
                                    <label class="mb-0">Tải Hình Ảnh</label>
                                    <input type="hidden" name="old_image" value="<?= $data['image'];?>">
                                    <input type="file" name="image" class="form-control mb-3"> 
                                    <label class="mb-0">Ảnh hiện tại</label>
                                    <img src="../uploads/<?= $data['image']; ?>" width='70px' height="70px" alt="Sản phẩm hình ảnh">
                                </div>  

                                <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Số lượng</label> 
                                    <input type="number" name="qty" required value="<?= $data['qty']; ?>" placeholder="Nhập số lượng" class="form-control mb-3"> 
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Trạng Thái</label> <br>
                                    <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked' ?>> 
                                </div>
    
                                <div class="col-md-3">
                                    <label class="mb-0">Xu Hướng</label> <br>
                                    <input type="checkbox" name="trending" <?= $data['trending'] == '0'?'':'checked'?>> 
                                </div>

                                </div>                            
                                <div class="col-md-12">
                                    <label class="mb-0">Tiêu Đề Meta</label>
                                    <input type="text" name="meta_title" required value="<?= $data['meta_title']; ?>"  class="form-control mb-3" placeholder="Nhập tiêu đề Meta"> 
                                </div>
    
                                <div class="col-md-12">
                                    <label class="mb-0">Mô Tả Meta</label>
                                    <textarea rows="3" name="meta_description" required placeholder="Nhập mô tả Meta" class="form-control mb-3"><?= $data['meta_description']; ?></textarea>
                                </div>
    
                                <div class="col-md-12">
                                    <label class="mb-0">Từ Khóa Meta</label>
                                    <textarea rows="3" name="meta_keywords" required placeholder="Nhập từ khóa Meta" class="form-control mb-3"><?= $data['meta_keywords']; ?></textarea>
                                </div>
    
                              
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="update_product_btn">Cập Nhật</button>
                                </div>
                            </div>                      
                        </form>
                    </div>
                </div>
                        <?php 
                    }
                    else
                    {
                        echo "Không tìm thấy ID Sản Phẩm";
                    }   
                    }
                    else
                    {
                        echo "ID thiếu trong Url";
                    }         
                        ?>
                    
            </div>
        </div>
    </div>

<?php include('includes/footer.php') ?>