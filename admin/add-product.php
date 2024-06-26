<?php 
  include('../middleware/adminMiddleware.php') ;
  include('includes/header.php') ;
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Thêm Sản Phẩm
                            <a href="products.php" class="btn btn-primary float-end">Quay Lại </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="mb-0">Các Danh Mục</label>
                                    <select name="category_id" class="form-select">
                                    <option selected>Chọn Danh Mục</option>
                                        <?php
                                            $categories = getAll("categories");

                                            if(mysqli_num_rows($categories) > 0)
                                            {
                                                foreach ($categories as $item) {
                                                    ?>
                                                         <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
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
                                <div class="col-md-6">
                                    <label class="mb-0">Tên Sản Phẩm</label>
                                    <input type="text" name="name" require placeholder="Nhập tên Sản Phẩm" class="form-control mb-3"> 
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Slug</label> 
                                    <input type="text" name="slug" require placeholder="Nhập Slug" class="form-control mb-3"> 
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Mô Tả Nhỏ</label>
                                    <textarea rows="3" name="small_description" require placeholder="Nhập mô tả nhỏ" class="form-control mb-3"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label class="mb-0">Mô Tả</label>
                                    <textarea rows="3" name="description" require placeholder="Nhập mô tả" class="form-control mb-3"> </textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Giá Gốc</label>
                                    <input type="text" name="original_price" require placeholder="Nhập giá gốc" class="form-control mb-3"> 
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-0">Giá Bán</label> 
                                    <input type="text" name="selling_price" require placeholder="Nhập giá bán" class="form-control mb-3"> 
                                </div>
                                
                                <div class="col-md-12">
                                    <label class="mb-0">Tải Hình Ảnh</label>
                                    <input type="file" name="image" require class="form-control mb-3"> 
                                </div>  

                                <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-0">Số lượng</label> 
                                    <input type="number" name="qty" require placeholder="Nhập số lượng" class="form-control mb-3"> 
                                </div>
                                <div class="col-md-3">
                                    <label class="mb-0">Trạng Thái</label> <br>
                                    <input type="checkbox" name="status" > 
                                </div>
    
                                <div class="col-md-3">
                                    <label class="mb-0">Xu Hướng</label> <br>
                                    <input type="checkbox" name="trending" > 
                                </div>

                                </div>                            
                                <div class="col-md-12">
                                    <label class="mb-0">Tiêu Đề Meta</label>
                                    <input type="text" name="meta_title" require class="form-control mb-3" placeholder="Nhập tiêu đề Meta"> 
                                </div>
    
                                <div class="col-md-12">
                                    <label class="mb-0">Mô Tả Meta</label>
                                    <textarea rows="3" name="meta_description" require placeholder="Nhập mô tả Meta" class="form-control mb-3"> </textarea>
                                </div>
    
                                <div class="col-md-12">
                                    <label class="mb-0">Từ Khóa Meta</label>
                                    <textarea rows="3" name="meta_keywords" require placeholder="Nhập từ khóa Meta" class="form-control mb-3"> </textarea>
                                </div>
    
                              
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="add_product_btn">Lưu</button>
                                </div>
                            </div>                      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php') ?>