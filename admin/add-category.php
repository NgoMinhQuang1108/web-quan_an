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
                            Thêm Danh Mục
                            <a href="category.php" class="btn btn-primary float-end">Quay Lại </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Tên Danh Mục</label>
                                    <input type="text" name="name" placeholder="Nhập tên danh mục" class="form-control"> 
                                </div>
                                <div class="col-md-6">
                                    <label for="">Slug</label> 
                                    <input type="text" name="slug" placeholder="Nhập Slug" class="form-control"> 
                                </div>
                                <div class="col-md-12">
                                    <label for="">Mô Tả</label>
                                    <textarea rows="3" name="description" placeholder="Nhập mô tả" class="form-control"> </textarea>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="">Tải Hình Ảnh</label>
                                    <input type="file" name="image" class="form-control"> 
                                </div>                              
                                <div class="col-md-12">
                                    <label for="">Tiêu Đề Meta</label>
                                    <input type="text" name="meta_title" class="form-control" placeholder="Nhập tiêu đề Meta"> 
                                </div>
    
                                <div class="col-md-12">
                                    <label for="">Mô Tả Meta</label>
                                    <textarea rows="3" name="meta_description" placeholder="Nhập mô tả Meta" class="form-control"> </textarea>
                                </div>
    
                                <div class="col-md-12">
                                    <label for="">Từ Khóa Meta</label>
                                    <textarea rows="3" name="meta_keywords" placeholder="Nhập từ khóa Meta" class="form-control"> </textarea>
                                </div>
    
                                <div class="col-md-6">
                                    <label for="">Trạng Thái</label>
                                    <input type="checkbox" name="status"> 
                                </div>
    
                                <div class="col-md-6">
                                    <label for="">Phổ Biến</label>
                                    <input type="checkbox" name="popular"> 
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary" name="add_category_btn">Lưu</button>
                                </div>
                            </div>                      
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php') ?>