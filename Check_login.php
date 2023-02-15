<?php
if (!session_start()) {
    session_start();
}
include "./Connect/Connect.php";
$con = Connect();

if(isset($_SESSION['username'])){
    header("location:index.php");
}
if(isset($_POST['taikhoan'])){
    $taikhoan = $_POST['taikhoan'];
    $matkhau = $_POST['matkhau'];
    //Kiem tra thong tin
    if ($taikhoan == "" || $matkhau == "") {
        echo "<div class='alert alert-danger' role = 'alert'>Vui lòng nhập đủ thông tin</div>";
    }
    else{
        $sql = "SELECT * FROM tbl_NguoiDung WHERE MaNV = '$taikhoan' AND MatKhau = '$matkhau'";
        $stmt = sqlsrv_query( $con, $sql);
        if( $stmt === false )
        {
            echo "Lỗi truy vấn.</br>";
            die( print_r( sqlsrv_errors(), true));
        }
        /* Đọc các dòng thông tin. */
       $a=0;
        while( $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC) )
        {
           $a=1;
        }
        if($a > 0){

            $_SESSION['username'] ="ok";// $row['MaNV'];

            header("location:index.php");
        }else{
            echo "<div>Sai thông tin đăng nhập</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ĐĂNG NHẬP TRANG QUẢN TRỊ</title>


</head>

<body ">

<form  class="user" method="POST">
    <div class="form-group">
        <input type="text" name="taikhoan" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="User Name ...">
    </div>
    <div class="form-group">
        <input type="password" name="matkhau" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
    </div>
    <div class="form-group">
    </div>
    <button class="btn btn-google btn-user btn-block" style="background-color: green;">Đăng nhập</button>

</form>



</body>

</html>
