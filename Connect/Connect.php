<?php
/* Địa chỉ SQL Server */
function Connect()
{
    $serverName = "192.168.2.145,1433";
    /* Tài khoản kết nối */
    $uid = 'suoitien';
    $pwd = 'suoitien@@123';

    /* Cấu hình kết nối */
    $connectionInfo = ["UID" => $uid, "PWD" => $pwd, "Database" => "KTD_TRACUU","CharacterSet" => "UTF-8"];

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

function delete($Ma)
{
    $conn=Connect();
    $sql = "DELETE FROM tbl_ThongTin WHERE Ma='$Ma'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt);  // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    //return 1;
}

function searchMa($Ma)
{
    $conn=Connect();
    $sql = "DELETE FROM tbl_ThongTin WHERE Ma='$Ma'";
    $stmt = sqlsrv_query($conn, $sql);

    if ($stmt === false) {
        echo "Lỗi truy vấn.</br>";
        die(print_r(sqlsrv_errors(), true));
    }

    sqlsrv_free_stmt($stmt);  // Giải phóng tài nguyên câu truy vấn
    sqlsrv_close($conn);

    //return 1;
}
?>
