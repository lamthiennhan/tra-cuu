<?php
/* Địa chỉ SQL Server */
function Connect()
{
    $serverName = "192.168.2.145,1433";
    /* Tài khoản kết nối */
    $uid = 'suoitien';
    $pwd = 'suoitien@@123';

    /* Cấu hình kết nối */
    $connectionInfo = ["UID" => $uid, "PWD" => $pwd, "Database" => "KTD_TRACUU", "CharacterSet" => "UTF-8"];

    /* Thực hiện kết nối */
    $conn = sqlsrv_connect($serverName, $connectionInfo);
    return $conn;
}
function Update_Hinh_Vitri($Ma,$Hinh_Vitri)
{
    $conn=Connect();
    $sql = "UPDATE tbl_ThongTin SET Hinh_Vitri='$Hinh_Vitri' WHERE Ma='$Ma'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt);  // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    //return 1;
}

function delete($ma)
{
    $conn = Connect();
    $sql = "DELETE FROM tbl_ThongTin WHERE Ma='$ma'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

}

function add($ma, $ten, $viTri, $hinhViTri, $hinhSoDo, $vao, $ra, $danDuong, $ghiChu, $ngay, $taiKhoan)
{
    $conn = Connect();
    $sql = "INSERT INTO tbl_ThongTin (Ma,Ten,Vitri,Hinh_ViTri,Hinh_SoDoTu,Vao,Ra,DanDuong,GhiChu,Ngay,TaiKhoan)
    VALUES ('$ma','$ten','$viTri','$hinhViTri','$hinhSoDo','$vao','$ra',
    '$danDuong','$ghiChu', '$ngay','$taiKhoan')";

    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);
}

function edit($ma, $ten, $viTri, $vao, $ra, $danDuong, $ghiChu, $ngay, $taiKhoan)
{
    $conn = Connect();
    $sql = "UPDATE tbl_ThongTin SET Ma='$ma',Ten='$ten',Vitri='$viTri',Vao='$vao',Ra='$ra',DanDuong='$danDuong',GhiChu='$ghiChu',Ngay='$ngay',TaiKhoan='$taiKhoan' WHERE Ma='$ma'";
    
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt); // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);
}

?>