$(document).ready(function () {


        $(document).on('click', '.delete_product_btn', function (e) {
        e.preventDefault();

        var id = $(this).val();

       // alert(id);

        swal({
            title: "Bạn có chắc không?",
            text: "Sau khi xóa, bạn sẽ không thể khôi phục tập tin này!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'product_id':id,
                        'delete_product_btn': true
                    },                  
                    success: function (response) {
                        
                        if(response == 200)
                        {
                            swal("Thành Công!", "Đã xóa Sản Phẩm!", "success");
                            $("#products_table").load(location.href + " #products_table");
                        }
                        else if(response == 500)
                        {
                            swal("Thất Bại!", "Đã có lỗi xảy ra!", "error");
                        }

                    }
                });
            } 
          });
    });

    $(document).on('click', '.delete_category_btn', function (e) {

    
        e.preventDefault();

        var id = $(this).val();

       // alert(id);

        swal({
            title: "Bạn có chắc không?",
            text: "Sau khi xóa, bạn sẽ không thể khôi phục tập tin này!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    method: "POST",
                    url: "code.php",
                    data: {
                        'category_id':id,
                        'delete_category_btn': true
                    },                  
                    success: function (response) {
                        
                        if(response == 200)
                        {
                            swal("Thành Công!", "Đã xóa Danh Mục!", "success");
                            $("#category_table").load(location.href + " #category_table");
                        }
                        else if(response == 500)
                        {
                            swal("Thất Bại!", "Đã có lỗi xảy ra!", "error");
                        }

                    }
                });
            } 
          });
    });
});