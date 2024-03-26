<?php 

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "webquanan";

    $con = mysqli_connect( $host, $username, $password, $database );

    if(!$con)
    {
        die("Kết nối không thành công: " . mysqli_connect_error());
    }
    

?>